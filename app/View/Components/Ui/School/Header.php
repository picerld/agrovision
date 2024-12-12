<?php

namespace App\View\Components\Ui\School;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Header extends Component
{
    public $registeredSchools;

    public function __construct()
    {
        $this->registeredSchools = DB::table('schools')->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.school.header');
    }
}
