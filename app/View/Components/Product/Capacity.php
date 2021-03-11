<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Capacity extends Component
{
    public $capacity;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product.capacity');
    }
}