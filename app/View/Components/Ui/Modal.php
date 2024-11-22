<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $identify;
    public $name;
    public $description;
    public $icon;
    public $iconBg;
    public $iconClass;

    public function __construct($identify, $name, $description, $icon = null, $iconBg = 'bg-red-100', $iconClass = 'text-red-600 size-6')
    {
        $this->identify = $identify;
        $this->name = $name;
        $this->description = $description;
        $this->icon = $icon;
        $this->iconBg = $iconBg;
        $this->iconClass = $iconClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.modal');
    }
}
