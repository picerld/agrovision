<?php

namespace App\View\Components\Ui\Commodity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $value;

    public function __construct()
    {
        $this->value = DB::table('commodities')->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.commodity.header');
    }
}
