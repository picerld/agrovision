<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Services\CommodityService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommodityApiController extends Controller
{
    protected $commodityService;
    public function __construct(CommodityService $commodityService)
    {
        $this->commodityService = $commodityService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $commodities = $search ? $this->commodityService->search($search) : $this->commodityService->getPaginate(6);

        return response()->json([
            'commodities' => $commodities,
            'status' => 'success',
        ], 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
