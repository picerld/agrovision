<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Services\CommodityService;
use Spatie\SimpleExcel\SimpleExcelWriter;
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
                    return '
                    <div class="flex items-center justify-center gap-2">
                        </button> <button type="button" class="btn btn-circle btn-text btn-sm delete-commodity"
                        data-id="' . $commodity->id . '" aria-label="Delete Commodity">
                        <span class="icon-[tabler--trash]"></span></button>
                        <button class="btn btn-circle btn-text btn-sm view-details" data-id="' . $commodity->id . '" aria-label="View Details">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 12a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0 7a1 1 0 1 0 2 0a1 1 0 1 0-2 0m0-14a1 1 0 1 0 2 0a1 1 0 1 0-2 0"/></svg>
                        </button>
                    </div>';
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

    public function exportXlsx()
    {
        $commodities = $this->commodityService->getAll();

        $writer = SimpleExcelWriter::streamDownload('commodities.xlsx');

        foreach($commodities as $commodity) {
            $writer->addRow([
                'Nama' => $commodity->name,
                'Masa Panen' => $commodity->harvest_date,
                'Gambar' => asset('storage/commodities/' . $commodity->image)
            ]);
        }

        $writer->toBrowser();
    }

    public function exportPdf()
    {
        
    }
}
