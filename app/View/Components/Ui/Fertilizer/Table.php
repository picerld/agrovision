<?php

namespace App\View\Components\Ui\Fertilizer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    /**
     * Create a new component instance.
     */

     public $schools;
     public $fertilizers;

    public function __construct($schools, $fertilizers)
    {
        $this->schools = $schools;
        $this->fertilizers = $fertilizers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.fertilizer.table');
    }
}
