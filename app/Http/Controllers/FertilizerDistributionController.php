<?php

namespace App\Http\Controllers;

use App\Models\FertilizerDistribution;
use App\Services\FertilizerDistributionService;
use App\Services\SchoolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FertilizerDistributionController extends Controller
{
    protected $fertilizerDistributionService;
    protected $schoolService;

    public function __construct(FertilizerDistributionService $fertilizerDistributionService, SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
        $this->fertilizerDistributionService = $fertilizerDistributionService;
    }

    public function index()
    {
        $search = request('search');
        $perPage = request('perPage', 6);

        $schools = DB::table('schools')->get();
        $fertilizers = $search ? $this->fertilizerDistributionService->search($search) : $this->fertilizerDistributionService->getAll($perPage);

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

            $this->fertilizerDistributionService->update($validated, $id);

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
