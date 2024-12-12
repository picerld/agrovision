<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Services\SchoolService;
use Yajra\DataTables\Facades\DataTables;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService =  $schoolService;
    }

    public function index(Request $request)
    {
        $schools = $this->schoolService->getAll();

        if ($request->ajax()) {
            return DataTables::of($schools)
                ->addColumn('action', function ($school) {
                    return '
            <div class="flex items-center justify-center gap-2">
                <button type="button" class="btn btn-circle btn-text btn-sm delete-school"
                        data-id="' . $school->id . '" aria-label="Delete School">
                    <span class="icon-[tabler--trash]"></span>
                </button>
                <button type="button" class="btn btn-circle btn-text btn-sm view-school" aria-label="View Detail">
                    <span data-id="' . $school->id . '">                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0 7a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0-14a1 1 0 1 0 2 0a1 1 0 1 0-2 0"/></svg></span>
                </button>
            </div>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }


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
