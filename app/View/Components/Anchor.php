<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Anchor extends Component
{
    public $link;

    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link = '', $icon = '')
    {
        $this->link = $link;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.anchor');
    }
}