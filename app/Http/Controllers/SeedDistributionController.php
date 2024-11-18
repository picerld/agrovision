<?php

namespace App\Http\Controllers;

use App\Models\SeedDistribution;
use App\Services\SeedDistributionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeedDistributionController extends Controller
{
    protected $seedDistributionService;

    public function __construct(SeedDistributionService $seedDistributionService)
    {
        $this->seedDistributionService = $seedDistributionService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 6);

        $schools = DB::table('schools')->get();
        $commodities = DB::table('commodities')->get();
        $seeds = $search ? $this->seedDistributionService->search($search)
            : $this->seedDistributionService->getAll($perPage);

        return view('pages.seed.index', [
            'schools' => $schools,
            'commodities' => $commodities,
            'seeds' => $seeds
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
                'type_of_seed' => 'required|exists:commodities,id',
                'seed_qty' => 'required|numeric',
                'date' => 'required|date',
                'unit' => 'required|string',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->seedDistributionService->store($validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Seed Distribution created successfully'
            ]);

            return redirect()->route('seed-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('seed-distributions.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SeedDistribution $seedDistribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeedDistribution $seedDistribution)
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
                'type_of_seed' => 'required|exists:commodities,id',
                'seed_qty' => 'required|numeric',
                'date' => 'required|date',
                'unit' => 'required|string',
                'pic' => 'required|string|min:5|max:50',
            ]);

            $this->seedDistributionService->update($id, $validated);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Seed Distribution updated successfully'
            ]);

            return redirect()->route('seed-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('seed-distributions.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeedDistribution $seedDistribution)
    {
        try {
            $this->seedDistributionService->delete($seedDistribution->id);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Seed Distribution deleted successfully'
            ]);

            return redirect()->route('seed-distributions.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('seed-distributions.index');
        }
    }
}
