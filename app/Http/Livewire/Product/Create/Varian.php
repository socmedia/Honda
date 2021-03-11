<?php

namespace App\Http\Livewire\Product\Create;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductVarian;

class Varian extends Component
{
    use WithFileUploads;

    public $varians, $productId;

    protected $listeners = [
        'productId',
        'removeVarian',
    ];

    protected $rules = [
        'varians.*' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function saveVarian()
    {
        $this->validate();
        foreach ($this->varians as $key => $varian) {
            $this->createVarian($varian);
        }
        $this->emitUp('productStored', $this->productId, 4);
    }

    public function createVarian($varianImage)
    {
        $varian = new ProductVarian();
        $varian->products_id = $this->productId;
        $varian->image_name = $varianImage->store('images/products/varian', 'public');
        $varian->is_active = 1;
        $varian->save();
    }

    public function removeVarian($name)
    {
        $this->removeUpload('varians', $name);
    }

    public function render()
    {
        return view('livewire.product.create.varian');
    }
}