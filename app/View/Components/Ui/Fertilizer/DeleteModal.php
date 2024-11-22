<?php

namespace App\View\Components\Ui\Fertilizer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $fertilizer;

    public function __construct($fertilizer)
    {
        $this->fertilizer = $fertilizer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.fertilizer.delete-modal');
    }
}
