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
        $schools = DB::table('schools')->get();
        $fertilizers = $search ? $this->fertilizerDistributionService->search($search) : $this->fertilizerDistributionService->getAll();

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
            return redirect()->route('fertilizer-distributions.index')->with('success', 'Fertilizer distribution created successfully');

        } catch (\Throwable $th) {
            return redirect()->route('fertilizer-distributions.index')->with('error', $th->getMessage());
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
    public function update(Request $request, FertilizerDistribution $fertilizerDistribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FertilizerDistribution $fertilizerDistribution)
    {
        //
    }
}
