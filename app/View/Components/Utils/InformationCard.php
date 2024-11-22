<?php

namespace App\View\Components\Utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformationCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $subtitle;

    public function __construct($title, $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.information-card');
    }
}
