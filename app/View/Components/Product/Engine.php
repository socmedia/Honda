<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Engine extends Component
{
    public $engine;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($engine)
    {
        $this->engine = $engine;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.engine');
    }
}