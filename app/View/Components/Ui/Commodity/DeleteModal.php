<?php

namespace App\View\Components\Ui\Commodity;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $commodity;

    public function __construct($commodity)
    {
        $this->commodity = $commodity;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.commodity.delete-modal');
    }
}
