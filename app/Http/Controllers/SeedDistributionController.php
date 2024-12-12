<?php

namespace App\Http\Controllers;

use App\Models\SeedDistribution;
use App\Services\SeedDistributionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SeedDistributionController extends Controller
{
    protected $seedDistributionService;

    public function __construct(SeedDistributionService $seedDistributionService)
    {
        $this->seedDistributionService = $seedDistributionService;
    }

    public function index(Request $request)
    {
        $schools = DB::table('schools')->get();
        $commodities = DB::table('commodities')->get();

        $seeds = $this->seedDistributionService->getAll();

        if ($request->ajax()) {
            return DataTables::of($seeds)
                ->addColumn('action', function ($seed) {
                    return '
                    <div class="flex items-center justify-center gap-2">
                <button type="button" class="btn btn-circle btn-text btn-sm delete-seed"
                        data-id="' . $seed->id . '" aria-label="Delete Seed">
                    <span class="icon-[tabler--trash]"></span>
                </button>
                <button type="button" class="btn btn-circle btn-text btn-sm view-seed" aria-label="View Detail">
                    <span data-id="' . $seed->id . '">                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0 7a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0-14a1 1 0 1 0 2 0a1 1 0 1 0-2 0"/></svg></span>
                </button>
            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

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
