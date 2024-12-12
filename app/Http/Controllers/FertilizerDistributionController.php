<?php

namespace App\Http\Controllers;

use App\Models\FertilizerDistribution;
use App\Services\FertilizerDistributionService;
use App\Services\SchoolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class FertilizerDistributionController extends Controller
{
    protected $fertilizerDistributionService;
    protected $schoolService;

    public function __construct(FertilizerDistributionService $fertilizerDistributionService, SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
        $this->fertilizerDistributionService = $fertilizerDistributionService;
    }

    public function index(Request $request)
    {
        $schools = $this->schoolService->getAll();
        $fertilizers = $this->fertilizerDistributionService->getAll();

        if ($request->ajax()) {
            return DataTables::of($fertilizers)
                ->addColumn('action', function ($fertilizer) {
                    return '
                    <div class="flex items-center justify-center gap-2">
                <button type="button" class="btn btn-circle btn-text btn-sm delete-fertilizer"
                        data-id="' . $fertilizer->id . '" aria-label="Delete Fertilizer">
                    <span class="icon-[tabler--trash]"></span>
                </button>
                <button type="button" class="btn btn-circle btn-text btn-sm view-fertilizer" aria-label="View Detail">
                    <span data-id="' . $fertilizer->id . '">                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0 7a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0-14a1 1 0 1 0 2 0a1 1 0 1 0-2 0"/></svg></span>
                </button>
            </div>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.fertilizer.index', [
            'schools' => $schools,
            'fertilizers' => $fertilizers
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
                'school_id' => 'required|exists:schools,id',
                'fertilizer_qty' => 'required|numeric',
                'date' => 'required|date',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->fertilizerDistributionService->store($validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Fertilizer Distribution created successfully'
            ]);

            return redirect()->route('fertilizer-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('fertilizer-distributions.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FertilizerDistribution $fertilizerDistribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FertilizerDistribution $fertilizerDistribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'school_id' => 'required|exists:schools,id',
                'fertilizer_qty' => 'required|numeric',
                'date' => 'required|date',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->fertilizerDistributionService->update($id, $validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Fertilizer Distribution updated successfully'
            ]);

            return redirect()->route('fertilizer-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('fertilizer-distributions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FertilizerDistribution $fertilizerDistribution)
    {
        try {
            $this->fertilizerDistributionService->delete($fertilizerDistribution->id);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Fertilizer Distribution deleted successfully'
            ]);

            return redirect()->route('fertilizer-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('fertilizer-distributions.index');
        }
    }
}
