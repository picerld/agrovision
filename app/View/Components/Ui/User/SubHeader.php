<?php

namespace App\View\Components\Ui\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class SubHeader extends Component
{
    public $registeredUser;

    public function __construct()
    {
        $this->registeredUser = DB::table('users')->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.user.sub-header');
    }
}
