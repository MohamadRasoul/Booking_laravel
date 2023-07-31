<?php

namespace App\View\Dashboard\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dashboard extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $title = null,
        public $head = null
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('dashboard.layouts.dashboard');
    }
}
