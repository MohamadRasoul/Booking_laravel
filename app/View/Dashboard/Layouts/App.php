<?php

namespace App\View\Dashboard\Layouts;

use Illuminate\View\Component;

class App extends Component
{

    public string $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard.layouts.app');
    }
}