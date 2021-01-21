<?php

namespace App\Http\Livewire\Product;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\Product;

class Create extends Component
{
    use WithFileUploads;

    protected $product_id;

    public $product = null;

    public $name, $category, $is_new, $promo_price, $price, $frame_n_feet, $banner,
    $dimensions_and_weight, $capacity, $electricity, $is_draft, $brochure;

    public $engine = "<table><tbody><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr></tbody></table>";

    public $showInfo = true;

    public $showBanner = false;

    public $showVarian = false;

    public $showFeature = false;

    public $showSpesification = false;

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

    public function resetBanner()
    {
        $this->reset('banner');
    }

    public function saveProductInformation()
    {
        $this->product_id = Str::uuid()->getHex();

        // Product::create([
        //     'id' => $this->product_id,
        //     'name' => $this->name,
        //     'slug_name' => Str::slug($this->name),
        //     'category' => $this->category,
        //     'promo_price' => $this->promo_price,
        //     'price' => $this->price,
        //     'is_new' => $this->is_new,
        //     'is_draft' => $this->is_draft,
        // ]);
        return redirect()->to('/admin/produk/tambah?id=' . $this->product_id);
    }

    public function saveBanner()
    {
        $this->showVarian = true;
    }

    public function checkBanner()
    {
        dd($this->banner);
    }

    public function render()
    {
        return view('livewire.product.create');
    }
}