<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = '')
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.admin.navbar');
    }
}