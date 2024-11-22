<?php

namespace App\View\Components\Ui\Fertilizer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Chart extends Component
{
    /**
     * Create a new component instance.
     */
    public $chartData;
    public $totalQuantity;

    public function __construct()
    {
        $distributions = DB::table('fertilizer_distributions')
            ->join('schools', 'fertilizer_distributions.school_id', '=', 'schools.id')
            ->select(
                'schools.name as school_name',
                DB::raw('SUM(fertilizer_distributions.fertilizer_qty) as total_fertilizer_qty')
            )
            ->groupBy('fertilizer_distributions.school_id', 'schools.name')
            ->orderBy('total_fertilizer_qty', 'desc')
            ->limit(3)
            ->get();

        $this->totalQuantity = $distributions->sum('total_fertilizer_qty');

        $this->chartData = [
            'series' => $distributions->map(function ($item) {
                return round(($item->total_fertilizer_qty / $this->totalQuantity) * 100, 1);
            })->toArray(),
            'labels' => $distributions->map(function ($item) {
                return $item->school_name;
            })->toArray()
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.fertilizer.chart');
    }
}
