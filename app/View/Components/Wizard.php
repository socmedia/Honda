<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Wizard extends Component
{
    public $nav;
    public $tab;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nav = '', $tab = '')
    {
        $this->nav = $nav;
        $this->tab = $tab;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.wizard');
    }
}