<?php

namespace App\View\Components\Ui\Fertilizer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class SubHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public $fertilizerDistributionTotal;

    public function __construct()
    {
        $this->fertilizerDistributionTotal = DB::table('fertilizer_distributions')->sum('fertilizer_qty');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.fertilizer.sub-header');
    }
}
