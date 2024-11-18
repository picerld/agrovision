<?php

namespace App\View\Components\Ui\Commodity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * Create a new component instance.
     */
    public $commodities;

    public function __construct($commodities)
    {
        $this->commodities = $commodities;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.commodity.detail');
    }
}
