<?php

namespace App\View\Components\Ui\Seed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $seedDistributionTotal;

    public function __construct()
    {
        $this->seedDistributionTotal = DB::table('seed_distributions')->sum('seed_qty');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.seed.header');
    }
}
