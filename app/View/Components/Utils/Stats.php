<?php

namespace App\View\Components\Utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\Component;

class Stats extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $model;
    public $icon;
    public $value;

    public function __construct($title, $model, $icon)
    {
        $this->title = $title;
        $this->icon = $icon;
        $modelClass = '\App\Models\\' . $model;

        if ($model) {
            if (Schema::hasColumn((new $modelClass)->getTable(), 'seed_qty')) {
                $this->value = $modelClass::sum('seed_qty');
            } elseif (Schema::hasColumn((new $modelClass)->getTable(), 'fertilizer_qty')) {
                $this->value = $modelClass::sum('fertilizer_qty');
            } else {
                $this->value = $modelClass::count();
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utils.stats');
    }
}
