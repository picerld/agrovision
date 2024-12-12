<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolApiController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        try {
            $schools = $search ? $this->schoolService->search($search) : $this->schoolService->getPaginate(6);

            return $this->successResponse('Schools fetched successfully', $schools);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to fetch schools', $e->getMessage());
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
            'schools' => $data,
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
