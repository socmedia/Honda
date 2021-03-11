<?php

namespace App\Http\Livewire\Product\Create;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductBanner;

class Banner extends Component
{
    use WithFileUploads;

    public $banners, $step = null, $productId = null;

    protected $listeners = [
        'productId',
        'removeBanner',
    ];

    protected $rules = [
        'banners.*' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function mount($productId)
    {
        $this->step = request()->step;
        $this->productId = $productId;
    }

    public function saveBanner()
    {
        $this->validate();
        foreach ($this->banners as $key => $banner) {
            $this->createBanner($banner);
        }
        $this->emitUp('productStored', $this->productId, 3);
    }

    public function createBanner($bannerFile)
    {
        $banner = new ProductBanner();
        $banner->products_id = $this->productId;
        $banner->banner_name = $bannerFile->store('images/products/banner', 'public');
        $banner->is_active = 1;
        $banner->save();
    }

    public function removeBanner($name)
    {
        $this->removeUpload('banners', $name);
    }

    public function render()
    {
        return view('livewire.product.create.banner');
    }
}