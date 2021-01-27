<?php

namespace App\Http\Livewire\Product;

use Illuminate\Session\SessionManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\Product;

class Create extends Component
{
    use WithFileUploads;

    protected $product_id;

    public $product = null;

    public $name, $category, $is_new, $promo_price, $price, $frame_n_feet, $banner, $feature_images, $feature_name, $feature_description,
    $dimensions_and_weight, $capacity, $electricity, $is_draft, $brochure;

    protected $listeners = ['resetBanner'];

    public function mount(SessionManager $session, $product)
    {
        if ($product) {
            $session->put("product.{$product->name}.last_viewed", now());
            $this->product = $product;
            $this->name = $product->name;
            $this->category = $product->category;
            $this->promo_price = $product->promo_price;
            $this->price = $product->price;
            $this->is_new = $product->is_new;
        }
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}