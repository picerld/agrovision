<?php

namespace App\View\Components\Ui\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class FertilizerList extends Component
{
    /**
     * Create a new component instance.
     */
    public $fertilizers;

    public function __construct()
    {
        $this->fertilizers = DB::table('fertilizer_distributions')
            ->join('schools', 'fertilizer_distributions.school_id', '=', 'schools.id')
            ->select('schools.name as school_name', 'fertilizer_distributions.*')
            ->orderBy('fertilizer_qty', 'DESC')
            ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.dashboard.fertilizer-list');
    }
}
