<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SeedDistributionService;
use Illuminate\Http\Request;

class SeedDistributionApiController extends Controller
{
    protected $seedDistributionService;

    public function __construct(SeedDistributionService $seedDistributionService)
    {
        $this->seedDistributionService = $seedDistributionService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 6);

        try {
            $seeds = $search ? $this->seedDistributionService->search($search) : $this->seedDistributionService->getPaginate($perPage);

            return $this->successResponse('Seed distributions fetched successfully', $seeds);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to fetch seeds', $th->getMessage());
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
                'type_of_seed' => 'required|exists:commodities,id',
                'seed_qty' => 'required|numeric',
                'date' => 'required|date',
                'unit' => 'required|string',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->seedDistributionService->store($validated);

            return $this->successResponse('Seed distribution created successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to create seed distribution', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seed = $this->seedDistributionService->getOne($id);

        if(!$seed) {
            return $this->errorResponse('Seed distribution not found', 'Seed distribution not found');
        }

        return $this->successResponse('Seed distribution fetched successfully', $seed);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'school_id' => 'required|exists:schools,id',
                'type_of_seed' => 'required|exists:commodities,id',
                'seed_qty' => 'required|numeric',
                'date' => 'required|date',
                'unit' => 'required|string',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->seedDistributionService->update($id, $validated);

            return $this->successResponse('Seed distribution updated successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to update seed distribution', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->seedDistributionService->delete($id);
    }

    protected function successResponse(string $message, $data)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'seeds' => $data,
        ], 200);
    }

    protected function errorResponse(string $message, string $error)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'error' => $error,
        ], 500);
    }
}
