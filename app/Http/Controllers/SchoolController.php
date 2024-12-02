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
        $perPage = $request->input('perPage', 5);

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
                'name' => 'required|string|min:5|max:50|unique:schools,name',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->store($validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'School created successfully'
            ]);

            return redirect()->route('schools.index');
        } catch (\Exception $e) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);

            return redirect()->back();
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
                'name' => 'required|string|min:5|max:50|unique:schools,name',
                'address' => 'required|string|min:5|max:100',
                'pic' => 'required|string|min:5|max:50',
                'phone_number' => 'required|string|min:5|max:25',
            ]);

            $this->schoolService->update($school->id, $validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'School updated successfully'
            ]);

            return redirect()->route('schools.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('schools.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        try {
            $this->schoolService->delete($school->id);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'School deleted successfully'
            ]);

            return redirect()->route('schools.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('schools.index');
        }
    }
}
