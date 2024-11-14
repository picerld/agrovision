<?php

namespace App\View\Components\Ui\Seed;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardList extends Component
{
    /**
     * Create a new component instance.
     */
    public $seed;
    public function __construct($seed)
    {
        $this->seed = $seed;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.seed.card-list');
    }
}
