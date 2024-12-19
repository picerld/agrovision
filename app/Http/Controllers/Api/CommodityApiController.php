<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommodityCollection;
use App\Services\CommodityService;
use Illuminate\Http\Request;

class CommodityApiController extends Controller
{
    protected $commodityService;

    public function __construct(CommodityService $commodityService)
    {
        $this->commodityService = $commodityService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 6);

        try {
            $commodities = $search ? $this->commodityService->search($search) : $this->commodityService->getPaginate($perPage);

            if (!$commodities) {
                return ApiResponse::error('Commodities not found', [], 404);
            }

            // using collection
            return ApiResponse::success('Commodities fetched successfully', new CommodityCollection($commodities));
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to fetch commodities', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:2|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harvest_date' => 'required|string',
            ]);

            $this->commodityService->store($validated, $request);

            return ApiResponse::success('Commodity created successfully', $validated);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to create commodity', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commodity = $this->commodityService->getOne($id);

        if (!$commodity) {
            return ApiResponse::error('Commodity not found', [], 404);
        }

        return ApiResponse::success('Commodity fetched successfully', $commodity);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:2|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harvest_date' => 'nullable|string',
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $this->commodityService->updateImage($request, $id);
            }

            $this->commodityService->update($id, $validated);

            return ApiResponse::success('Commodity updated successfully', $validated);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to update commodity', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->commodityService->delete($id);

            return ApiResponse::success('Commodity deleted successfully', null);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to delete commodity', $th->getMessage());
        }
    }
}
