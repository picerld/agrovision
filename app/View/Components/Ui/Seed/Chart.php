<?php

namespace App\View\Components\Ui\Seed;

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
    public $totalSeeds;

    public function __construct()
    {
        $distributions = DB::table('seed_distributions')
            ->join('schools', 'seed_distributions.school_id', '=', 'schools.id')
            ->select(
                'schools.name as school_name',
                DB::raw('SUM(seed_distributions.seed_qty) as total_seed_qty')
            )
            ->groupBy('seed_distributions.school_id', 'schools.name')
            ->orderBy('total_seed_qty', 'desc')
            ->limit(3)
            ->get();

        $this->totalSeeds = $distributions->sum('total_seed_qty');

        $this->chartData = [
            'series' => $distributions->map(function ($item) {
                return round(($item->total_seed_qty / $this->totalSeeds) * 100, 1);
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
        return view('components.ui.seed.chart');
    }
}
