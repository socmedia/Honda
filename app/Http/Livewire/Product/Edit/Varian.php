<?php

namespace App\Http\Livewire\Product\Edit;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductVarian;

class Varian extends Component
{
    use WithFileUploads, FileHandler;

    public $productId = null, $tempVarians;

    protected $listeners = [
        'removeVarian',
    ];

    protected $rules = [
        'tempVarians.*' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function saveVarian()
    {
        $this->validate();
        if ($this->tempVarians) {
            foreach ($this->tempVarians as $key => $varian) {
                $this->createVarian($varian);
            }
            $this->reset('tempVarians');
            session()->flash('success-store', 'Varian berhasil ditambahkan.');
        }
    }

    public function createVarian($varianFile)
    {
        $varian = new ProductVarian();
        $varian->products_id = $this->productId;
        $varian->image_name = $varianFile->store('images/products/varian', 'public');
        $varian->is_active = 1;
        $varian->save();
    }

    public function updateActiveState($id, $status)
    {
        $varian = ProductVarian::find($id);
        $varian->is_active = $status;
        $varian->save();
        session()->flash('success-edit', $status == 1 ? 'Varian berhasil di aktifkan' : 'Varian berhasil di nonaktifkan' . '.');
    }

    public function removeVarian($name)
    {
        $this->removeUpload('tempVarians', $name);
    }

    public function destroyVarian($id)
    {
        $varian = ProductVarian::find($id);
        $this->deleteMedia(explode('/', $varian->image_name)[3], 'productVarian');
        $varian->delete();
        session()->flash('success-edit', 'Varian berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.product.edit.varian', [
            'datas' => ProductVarian::where('products_id', $this->productId)->get(),
        ]);
    }
}