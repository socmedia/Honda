<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Electricity extends Component
{
    public $electricity;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($electricity)
    {
        $this->electricity = $electricity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.electricity');
    }
}