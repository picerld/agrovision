<?php

namespace App\View\Components\Ui\School;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $school;

    public function __construct($school)
    {
        $this->school = $school;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.school.delete-modal');
    }
}
