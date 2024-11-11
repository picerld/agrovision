<?php

namespace App\View\Components\Utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class DistributionChart extends Component
{
    public $months;
    public $seedData;
    public $fertilizerData;
    public $totalDistribution;

    public function __construct()
    {
        $seedQuery = DB::table('seed_distributions')->selectRaw('MONTH(created_at) as month, sum(seed_qty) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $fertilizerQuery = DB::table('fertilizer_distributions')->selectRaw('MONTH(created_at) as month, sum(fertilizer_qty) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $this->months = collect(range(1, 12))->map(function ($month) {
            return \Carbon\Carbon::create()->month($month)->format('M');
        })->toArray();

        $this->seedData = $this->mapDataByMonth($seedQuery);
        $this->fertilizerData = $this->mapDataByMonth($fertilizerQuery);
        $this->totalDistribution = $seedQuery->sum('total') + $fertilizerQuery->sum('total');
    }

    private function mapDataByMonth($items)
    {
        $data = array_fill(0, 12, 0);

        foreach ($items as $item) {
            $data[$item->month - 1] = $item->total;
        }

        return $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.distribution-chart');
    }
}
