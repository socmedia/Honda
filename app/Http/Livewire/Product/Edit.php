<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Edit extends Component
{
    public $productId;

    public $product = null, $step = 1;

    protected $listeners = [
        'previousStep',
    ];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function previousStep()
    {
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.product.edit');
    }
}