<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\Product;

class Create extends Component
{
    use WithFileUploads;

    public $productId;

    public $product = null, $step = 1, $prevStep = null, $nextStep = 2;

    public $productStored = false;

    protected $listeners = [
        'resetBanner',
        'productStored' => 'redirectWithInput',
    ];

    public function redirectWithInput($productId, $step)
    {
        $this->product = $productId;
        $this->step = $step;
        $this->productId = $productId;
    }

    public function sendProductId($productId)
    {
        if ($this->product !== null) {
            $this->emitTo('banner', 'productId', $productId);
            $this->emitTo('varian', 'productId', $productId);
            $this->emitTo('feature', 'productId', $productId);
            $this->emitTo('spesification', 'productId', $productId);
        }
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}