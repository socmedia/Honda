<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBanner extends Component
{
    use WithFileUploads;

    public $banner;

    public function banner()
    {
        $this->emitUp('banner', $this->banner);
    }

    public function render()
    {
        return view('livewire.product.create-banner');
    }
}