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

        try {
            $seeds = $search ? $this->seedDistributionService->search($search) : $this->seedDistributionService->getPaginate(6);

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
