<?php

namespace App\View\Components\Ui\Seed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $seeds, public $schools, public $commodities)
    {
        $this->seeds = $seeds;
        $this->schools = $schools;
        $this->commodities = $commodities;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.seed.table');
    }
}
