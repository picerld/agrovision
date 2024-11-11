<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\CommodityUpdateRequest;
use App\Services\CommodityService;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $commodityService;

    public function __construct(CommodityService $commodityService)
    {
        $this->commodityService = $commodityService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 6);

        $commodities = $search ? $this->commodityService->search($search)
            : $this->commodityService->getAll($perPage);

        return view('pages.commodity.index', [
            'commodities' => $commodities
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
        dd($request->all());
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:5|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harvest_date' => 'required|string',
            ]);

            $this->commodityService->store($validated, $request);

            return redirect()->route('commodities.index')->with('success', 'Commodity created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $commodity = $this->commodityService->getOne($id);
        dd($commodity);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $commodity = $this->commodityService->getOne($id);

        return view('pages.commodities.edit', [
            'commodity' => $commodity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:5|max:50',
                'harvest_date' => 'required|string',
                'image' => 'nullable|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $this->commodityService->updateImage($request, $id);
            }

            $this->commodityService->update($id, $validated);
            return redirect()->route('commodities.index')->with('success', 'Commodity updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('commodities.index')->with('error', $th->getMessage());
        }

        return redirect()->route('commodities.index')->with('success', 'Commodity updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commodity = $this->commodityService->getOne($id);

        try {
            if ($commodity->image) {
                $this->commodityService->deleteImage($commodity->image);
            }
            $this->commodityService->delete($commodity->id);
            return redirect()->route('commodities.index')->with('success', 'Commodity deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('commodities.index')->with('error', $th->getMessage());
        }
    }
}
