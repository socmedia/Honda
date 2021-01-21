<?php

namespace App\Http\Livewire\Banner;

use Livewire\Component;
use Modules\Banner\Repository\Model\Entities\Banner;

class Edit extends Component
{
    public $bannerId, $title, $image, $page_target, $alt, $description, $show_banner, $duration;

    public function mount()
    {
        $banner = Banner::findOrFail(request()->id);
        $this->bannerId = $banner->id;
        $this->title = $banner->title;
        $this->image = $banner->image_name;
        $this->page_target = $banner->page_target;
        $this->alt = $banner->alt;
        $this->description = $banner->description;
        $this->show_banner = $banner->is_active;
        $this->duration = $banner->active_until;
    }

    public function saveBanner()
    {
        $banner = Banner::findOrFail($this->bannerId);
        $banner->title = $this->title;
        $banner->page_target = $this->page_target;
        $banner->alt = $this->alt;
        $banner->description = $this->description;
        $banner->is_active = $this->show_banner;
        $banner->active_until = $this->duration;
        $banner->save();

        return session()->flash('success', 'Banner berhasil diperbarui, untuk melihat banner silahkan kunjungi link berikut. <a href="' . route('adm.banner.index') . '" class="text-muted">Lihat banner</a>');
    }

    public function render()
    {
        return view('livewire.banner.edit');
    }
}