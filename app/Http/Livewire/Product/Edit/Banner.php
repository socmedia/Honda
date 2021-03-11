<?php

namespace App\Http\Livewire\Product\Edit;

use App\Traits\FileHandler;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\ProductBanner;

class Banner extends Component
{
    use WithFileUploads, FileHandler;

    public $productId = null, $tempBanners;

    protected $listeners = [
        'removeBanner',
    ];

    protected $rules = [
        'tempBanners.*' => 'required|mimes:png,jpg,jpeg,webp|max:512',
    ];

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function saveBanner()
    {
        $this->validate();
        if ($this->tempBanners) {
            foreach ($this->tempBanners as $key => $banner) {
                $this->createBanner($banner);
            }
            $this->reset('tempBanners');
            session()->flash('success-store', 'Banner berhasil ditambahkan.');
        }
    }

    public function createBanner($bannerFile)
    {
        $banner = new ProductBanner();
        $banner->products_id = $this->productId;
        $banner->banner_name = $bannerFile->store('images/products/banner', 'public');
        $banner->is_active = 1;
        $banner->save();
    }

    public function updateActiveState($id, $status)
    {
        $banner = ProductBanner::find($id);
        $banner->is_active = $status;
        $banner->save();
        session()->flash('success-edit', $status == 1 ? 'Banner berhasil di aktifkan' : 'Banner berhasil di nonaktifkan' . '.');
    }

    public function removeBanner($name)
    {
        $this->removeUpload('tempBanners', $name);
    }

    public function destroyBanner($id)
    {
        $banner = ProductBanner::find($id);
        $this->deleteMedia(explode('/', $banner->banner_name)[3], 'productBanner');
        $banner->delete();
        session()->flash('success-edit', 'Banner berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.product.edit.banner', [
            'datas' => ProductBanner::where('products_id', $this->productId)->get(),
        ]);
    }
}