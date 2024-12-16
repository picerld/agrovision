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
        $perPage = $request->input('per_page', 6);

        try {
            $schools = $search ? $this->schoolService->search($search) : $this->schoolService->getPaginate($perPage);

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
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:5|max:50|unique:schools,name',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->store($validated);

            return $this->successResponse('School created successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to create school', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = $this->schoolService->getOne($id);

        if(!$school) {
            return $this->errorResponse('School not found', 'School not found');
        }

        return $this->successResponse('School fetched successfully', $school);
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
                'name' => 'required|string|min:5|max:50',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->update($id, $validated);

            return $this->successResponse('School updated successfully', $validated);
        } catch (\Throwable $th) {
            return $this->errorResponse('Failed to update school', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->schoolService->delete($id);
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
