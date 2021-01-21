<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $title, $isLarge;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $isLarge = false)
    {
        $this->title = $title;
        $this->isLarge = $isLarge;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}