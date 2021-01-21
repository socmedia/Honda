<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Modules\Banner\Repository\BannerRepositoryInterface;
use Modules\Banner\Repository\Model\Entities\Banner;

class Action extends Component
{
    private $model;

    public $data, $title, $image, $page_target, $alt, $description, $show_banner, $duration;

    public function mount(BannerRepositoryInterface $bannerRepositoryInterface)
    {
        $this->model = $bannerRepositoryInterface;
        $this->data = $this->model->getAll();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|min:3',
            'image' => 'required|images|mimes:png,jpg|max:512|unique:banners,image_name,except,id',
            'page_target' => 'required|in_array:homepage,produk-cub,produk-matic,produk-sport,produk-bigbike,ahass,honda-genuine-part,honda-apparel,honda-genuine-accessories',
            'alt' => 'nullable|string|min:3',
            'description' => 'nullable|string|min:10',
            'show_banner' => 'required|boolean',
            'duration' => 'nullable',
        ]);

        if ($this->data) {
            // Banner::create({

            // });
        }
    }

    public function render()
    {
        return view('livewire.banner.action');
    }
}