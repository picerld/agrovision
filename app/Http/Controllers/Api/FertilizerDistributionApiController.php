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

        try {
            $fertilizers = $search ? $this->fertilizerDistributionService->search($search) : $this->fertilizerDistributionService->getPaginate(6);

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
