<?php

namespace App\Http\Livewire\Product\Edit;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductFeature;

class Feature extends Component
{
    use WithFileUploads, FileHandler;

    public $name, $image, $description, $productId;

    protected $listeners = [
        'productId',
        'removeImage',
        'saveFeature',
        'updateFeature',
        'editModeState',
    ];

    protected $rules = [
        'image' => 'required|mimes:png,jpg,jpeg,webp|max:512',
        'name' => 'required|min:3|max:191',
        'description' => 'required|min:3',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function getThisFeature()
    {
        ProductFeature::where('products_id', $this->productId)->get();
    }

    public function saveFeature()
    {
        $this->validate();
        $this->createFeature();
    }

    public function createFeature()
    {
        $feature = new ProductFeature();
        $feature->products_id = $this->productId;

        if ($this->image) {
            $feature->image_name = $this->image->store('images/products/feature', 'public');
        }

        $feature->title = $this->name;
        $feature->description = $this->description;
        $feature->save();
        $this->reset('name', 'image', 'description');
        session()->flash('success-store', 'Fitur berhasil ditambahkan.');
    }

    public function deleteFeature($id)
    {
        $feature = ProductFeature::findOrFail($id);
        $this->deleteMedia(explode('/', $feature->image_name)[3], 'productFeature');
        $feature->delete();
        session()->flash('success-delete', 'Varian berhasil dihapus.');
    }

    public function removeImage($name)
    {
        $this->removeUpload('image', $name);
    }

    public function render()
    {
        return view('livewire.product.edit.feature', [
            'features' => ProductFeature::where('products_id', $this->productId)->get(),
        ]);
    }
}
