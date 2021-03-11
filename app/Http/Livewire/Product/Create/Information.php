<?php

namespace App\Http\Livewire\Product\Create;

use App\Constants\MotorCategories;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\Product;

class Information extends Component
{
    use WithFileUploads;

    public $thumbnail, $name, $category, $price, $promoPrice, $isNew, $brochure;

    protected function rules()
    {
        $categories = new MotorCategories();
        return [
            'thumbnail' => 'required|max:256|mimes:png,jpg,jpeg,webp',
            'name' => 'required|min:2|max:191|' . Rule::unique('products', 'name'),
            'brochure' => 'required|max:10240|mimes:pdf',
            'category' => 'required|in:' . implode(',', $categories->getOnlySlug()),
            'price' => 'required|regex:/^[0-9]/',
            'promoPrice' => 'nullable|regex:/^[0-9]/',
            'isNew' => 'nullable',
        ];
    }

    public function getCategories()
    {
        $categories = new MotorCategories();
        return $categories->getAll();
    }

    public function storeInformation()
    {
        $this->dispatchBrowserEvent('updated-var');
        $this->validate();
        $id = Str::uuid()->getHex();
        $this->store($id);
        $this->emitUp('productStored', $id, 2);
    }

    public function store($id)
    {
        $product = new Product();
        $product->id = $id;
        $product->name = $this->name;
        $product->slug_name = Str::slug($this->name);
        $product->thumbnail = $this->thumbnail->store('images/products/thumbnail', 'public');
        $product->category = $this->category;
        $product->promo_price = $this->promoPrice === null ? 0 : $this->promoPrice;
        $product->price = $this->price;
        $product->is_new = $this->isNew ? 1 : 0;
        $product->brochure = $this->brochure->store('files/products/brochure', 'public');
        $product->is_draft = 1;
        $product->save();
    }

    public function updatedThumbnail()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedName()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedCategory()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedPrice()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedPromoPrice()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedBrochure()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function updatedIsNew()
    {
        $this->dispatchBrowserEvent('updated-var');
    }

    public function render()
    {
        return view('livewire.product.create.information', [
            'categories' => $this->getCategories(),
        ]);
    }
}