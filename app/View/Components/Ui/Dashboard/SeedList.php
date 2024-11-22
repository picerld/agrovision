<?php

namespace App\View\Components\Ui\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class SeedList extends Component
{
    /**
     * Create a new component instance.
     */
    public $seeds;

    public function __construct()
    {
        $this->seeds = DB::table('seed_distributions')
            ->join('schools', 'seed_distributions.school_id', '=', 'schools.id')
            ->join('commodities', 'seed_distributions.type_of_seed', '=', 'commodities.id')
            ->select('schools.name as school_name', 'seed_distributions.*', 'commodities.*')
            ->orderBy('seed_qty', 'DESC')
            ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.dashboard.seed-list');
    }
}
