<?php

namespace App\View\Components\Ui\Seed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Drawer extends Component
{
    /**
     * Create a new component instance.
     */
    public $seed;
    public $schools;
    public $commodities;
    public function __construct($commodities, $schools, $seed)
    {
        $this->commodities = $commodities;
        $this->schools = $schools;
        $this->seed = $seed;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.seed.drawer');
    }
}
