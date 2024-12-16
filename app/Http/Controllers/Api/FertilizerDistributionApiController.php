<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

            return $this->successResponse('Fertilizer distributions fetched successfully', $fertilizers);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to fetch fertilizer distributions', $th->getMessage());
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

            return $this->successResponse('Fertilizer distribution created successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to create fertilizer distribution', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fertilizers = $this->fertilizerDistributionService->getOne($id);

        if (!$fertilizers) {
            return $this->errorResponse('Fertilizer distribution not found', 'Fertilizer distribution not found');
        }

        return $this->successResponse('Fertilizer distribution fetched successfully', $fertilizers);
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

            return $this->successResponse('Fertilizer distribution updated successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to update fertilizer distribution', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->fertilizerDistributionService->delete($id);

        return $this->successResponse('Fertilizer distribution deleted successfully', null);
    }

    protected function successResponse(string $message, $data)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'fertilizers' => $data,
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
