<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Frame extends Component
{
    public $frame;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($frame)
    {
        $this->frame = $frame;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.frame');
    }
}