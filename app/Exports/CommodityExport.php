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
        return Commodity::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Komoditas',
            'Image',
            'Masa Panen',
            'created_at',
            'updated_at',
        ];
    }
}
