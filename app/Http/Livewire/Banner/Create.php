<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Banner\Repository\Model\Entities\Banner;

class Create extends Component
{
    use WithFileUploads;

    public $title, $image, $page_target, $alt, $description, $show_banner, $duration;

    protected $listerners = ['resetImage'];

    public function resetImage()
    {
        $this->image = null;
    }

    public function saveBanner()
    {
        $this->validate([
            'title' => 'required|string|min:3|unique:banners,title,except,id',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:512|unique:banners,image_name,except,id',
            'page_target' => 'required|in:homepage,produk-bigbike,ahass,honda-genuine-part,honda-apparel,honda-genuine-accessories',
            'alt' => 'nullable|string|min:3',
            'description' => 'nullable|string|min:10',
            'show_banner' => 'required|boolean',
            'duration' => 'nullable',
        ]);

        Banner::create([
            'title' => $this->title,
            'image_name' => $this->image->store('images/banner', 'public'),
            'page_target' => $this->page_target,
            'alt' => $this->alt,
            'description' => $this->description,
            'is_active' => $this->show_banner,
            'active_until' => $this->duration,
        ]);

        $this->reset();

        return session()->flash('success', 'Banner berhasil disimpan, untuk melihat banner silahkan kunjungi link berikut. <a href="' . route('adm.banner.index') . '" class="text-muted">Lihat banner</a>');
    }

    public function render()
    {
        return view('livewire.banner.create');
    }
}