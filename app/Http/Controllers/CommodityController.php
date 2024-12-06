<?php

namespace App\Http\Controllers;

use App\DataTables\CommoditiesDataTable;
use App\Http\Requests\CommodityStoreRequest;
use App\Http\Requests\CommodityUpdateRequest;
use App\Models\Commodity;
use App\Services\CommodityService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $commodities = $this->commodityService->getAll();

        if ($request->ajax()) {
            return DataTables::of($commodities)
                ->addColumn('action', function ($commodity) {
                    return '<button class="btn btn-circle btn-text btn-lg view-details" data-id="' . $commodity->id . '" aria-label="View Details">
                                <span class="icon-[tabler--eye]"></span>
                            </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

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
        try {
            $validated = $request->validate([
                'name' => 'required|string|min:2|max:50',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'harvest_date' => 'required|string',
            ]);

            $this->commodityService->store($validated, $request);

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Commodity created successfully'
            ]);

            return redirect()->route('commodities.index');
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
    public function show($id)
    {
        $commodity = Commodity::findOrFail($id);

        // Return the Blade component view for the modal
        return response()->json([
            'modalHtml' => view('components.ui.commodity.detail', compact('commodity'))->render(),
        ]);
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
                'name' => 'required|string|min:2|max:50',
                'harvest_date' => 'required|string',
                'image' => 'nullable|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $this->commodityService->updateImage($request, $id);
            }

            $this->commodityService->update($id, $validated);
            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Commodity updated successfully'
            ]);

            return redirect()->route('commodities.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
            return redirect()->route('commodities.index');
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

            session()->flash('toast', [
                'type' => 'primary',
                'message' => 'Commodity deleted successfully'
            ]);

            return redirect()->route('commodities.index');
        } catch (\Throwable $th) {
            session()->flash('toast', [
                'type' => 'primary',
                'message' => $th->getMessage()
            ]);

            return redirect()->route('commodities.index');
        }
    }
}
