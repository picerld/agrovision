<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\FertilizerDistributionCollection;
use App\Services\FertilizerDistributionService;
use Illuminate\Http\Request;

class FertilizerDistributionApiController extends Controller
{
    protected $fertilizerDistributionService;

    public function __construct(FertilizerDistributionService $fertilizerDistributionService)
    {
        $this->fertilizerDistributionService = $fertilizerDistributionService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 6);

        try {
            $fertilizers = $search ? $this->fertilizerDistributionService->search($search) : $this->fertilizerDistributionService->getPaginate($perPage);

            return ApiResponse::success('Fertilizer distributions fetched successfully', new FertilizerDistributionCollection($fertilizers));
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to fetch fertilizer distributions', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'school_id' => 'required|exists:schools,id',
                'fertilizer_qty' => 'required|numeric',
                'date' => 'required|date',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->fertilizerDistributionService->store($validated);

            return ApiResponse::success('Fertilizer distribution created successfully', $validated);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to create fertilizer distribution', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fertilizers = $this->fertilizerDistributionService->getOne($id);

        if (!$fertilizers) {
            return ApiResponse::error('Fertilizer distribution not found', [], 404);
        }

        return ApiResponse::success('Fertilizer distribution fetched successfully', $fertilizers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'school_id' => 'required|exists:schools,id',
                'fertilizer_qty' => 'required|numeric',
                'date' => 'required|date',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->fertilizerDistributionService->update($id, $validated);

            return ApiResponse::success('Fertilizer distribution updated successfully', $validated);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to update fertilizer distribution', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->fertilizerDistributionService->delete($id);
            
            return ApiResponse::success('Fertilizer distribution deleted successfully', null);
        } catch (\Throwable $th) {
            return ApiResponse::error('Failed to delete fertilizer distribution', $th->getMessage());
        }
    }
}
