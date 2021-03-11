<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Dimension extends Component
{
    public $dimension;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dimension)
    {
        $this->dimension = $dimension;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.dimension');
    }
}