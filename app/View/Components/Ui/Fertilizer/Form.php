<?php

namespace App\View\Components\Ui\Fertilizer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public $schools;
    public function __construct($schools)
    {
        $this->schools = $schools;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.fertilizer.form');
    }
}
