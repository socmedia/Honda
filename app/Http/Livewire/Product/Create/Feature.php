<?php

namespace App\Http\Livewire\Product\Create;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductFeature;

class Feature extends Component
{
    use WithFileUploads;

    public $totalFeature = 1, $features = [['image' => null, 'name' => null, 'description' => null]], $productId;

    protected $listeners = [
        'productId',
        'removeImage',
        'updateTotal',
    ];

    protected $rules = [
        'features.*.image' => 'required|mimes:png,jpg,jpeg,webp|max:512',
        'features.*.name' => 'required|min:3|max:191',
        'features.*.description' => 'required|min:3',
    ];

    protected $messages = [
        'features.*.image.required' => 'The features image field is required.',
        'features.*.name.required' => 'The features name field is required.',
        'features.*.description.required' => 'The features description field is required.',

        'features.*.image.mimes' => 'The features image must be a file of type: png, jpg, jpeg, webp.',

        'features.*.image.max' => 'The features image may not be greater than 512 kilobytes.',
        'features.*.name.max' => 'The features name may not be greater than 191 characters.',

        'features.*.name.min' => 'The features name must be at least 3 characters.',
        'features.*.description.min' => 'The features description must be at least 3 characters.',
    ];

    public function updateTotal()
    {
        $this->reset('features');
        for ($i = 1; $this->totalFeature > $i; $i++) {
            array_push($this->features, ['image' => null, 'name' => null, 'description' => null]);
        }
    }

    public function saveFeature()
    {
        $this->validate();
        foreach ($this->features as $key => $feature) {
            $this->createFeature($feature);
        }
        $this->emitUp('productStored', $this->productId, 5);
    }

    public function createFeature($request)
    {
        $feature = new ProductFeature();
        $feature->products_id = $this->productId;
        $feature->image_name = $request['image']->store('images/products/feature', 'public');
        $feature->title = $request['name'];
        $feature->description = $request['description'];
        $feature->save();
    }

    public function removeImage($name, $i)
    {
        $this->removeUpload('features.' . $i . '.image', $name);
    }

    public function render()
    {
        return view('livewire.product.create.feature');
    }
}