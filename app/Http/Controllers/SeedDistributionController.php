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

    public function index()
    {
        $schools = DB::table('schools')->get();
        $commodities = DB::table('commodities')->get();
        $seeds = $this->seedDistributionService->getAll();

        return view('pages.seed.index',[
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
            return redirect()->route('seed-distributions.index')->with('success', 'Seed distribution created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('seed-distributions.index')->with('error', $th->getMessage());
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
    public function update(Request $request, SeedDistribution $seedDistribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeedDistribution $seedDistribution)
    {
        //
    }
}
