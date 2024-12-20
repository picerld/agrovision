<?php

namespace App\Exports;

use App\Models\Commodity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CommodityExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $commodities = Commodity::query()
            ->select(['id', 'name', 'image', 'harvest_date'])
            ->orderBy('created_at', 'DESC')
            ->get();

        $commodities->transform(function ($commodity) {
            $commodity->image = asset('storage/commodities/' . $commodity->image);
            return $commodity;
        });

        return $commodities;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Komoditas',
            'Image',
            'Masa Panen',
        ];
    }
}
