<?php

namespace App\View\Components\Ui\Seed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */

    public $schools;
    public $commodities;
    public function __construct($schools, $commodities)
    {
        $this->schools = $schools;
        $this->commodities = $commodities;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.seed.form');
    }
}
