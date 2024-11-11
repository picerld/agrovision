<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService =  $schoolService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);

        $schools = $search ? $this->schoolService->search($search)
            : $this->schoolService->getAll($perPage);

        return view('pages.school.index', [
            'schools' => $schools
        ]);
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
                'name' => 'required|string|min:5|max:50',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->store($validated);

            return redirect()->route('schools.index')->with('success', 'School created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:5|max:50',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->update($school->id, $validated);

            return redirect()->route('schools.index')->with('success', 'School updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('schools.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
