<?php

namespace App\Http\Livewire\Product\Edit;

use App\Constants\MotorCategories;
use App\Traits\FileHandler;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Product\Repository\Model\Entities\Product;

class Information extends Component
{
    use WithFileUploads, FileHandler;

    public $productId, $thumbnail, $name, $category, $price, $promoPrice, $isNew, $isDraft, $brochure, $tempThumbnail, $tempBrochure;

    protected $messages = [
        'tempThumbnail.max' => 'The thumbnail field may not be greater than 256 kilobytes',
        'tempBrochure.max' => 'The brochure field may not be greater than 10240 kilobytes',
        'tempThumbnail.mimes' => 'The thumbnail must be a file of type: png, jpg, jpeg, webp.',
        'tempBrochure.mimes' => 'The brochure must be a file of type: pdf.',
    ];

    protected function rules()
    {
        $categories = new MotorCategories();
        return [
            'tempThumbnail' => 'nullable|max:256|max:256|mimes:png,jpg,jpeg,webp',
            'name' => 'required|min:2|max:191|' . Rule::unique('products', 'name')->ignore($this->productId),
            'tempBrochure' => 'nullable|max:10240|mimes:pdf',
            'category' => 'required|in:' . implode(',', $categories->getOnlySlug()),
            'price' => 'required|regex:/^[0-9]/',
            'promoPrice' => 'nullable|regex:/^[0-9]/',
            'isNew' => 'nullable',
        ];
    }

    public function mount($product)
    {
        $this->productId = $product->id;
        $this->thumbnail = $product->thumbnail;
        $this->name = $product->name;
        $this->category = $product->category;
        $this->price = $product->price;
        $this->promoPrice = $product->promo_price;
        $this->isNew = $product->is_new;
        $this->isDraft = $product->is_draft;
        $this->brochure = $product->brochure;
    }

    public function getCategories()
    {
        $categories = new MotorCategories();
        return $categories->getAll();
    }

    public function updateInformation()
    {
        $this->dispatchBrowserEvent('updated-var');
        $this->validate();
        $this->update($this->productId);
        session()->flash('success', 'Produk berhasil diperbarui.');
        redirect()->route('adm.product.index');
    }

    public function update($id)
    {
        $product = Product::where('id', $id)->first();
        $product->name = $this->name;
        $product->slug_name = Str::slug($this->name);

        if ($this->tempThumbnail) {
            $this->deleteMedia(explode('/', $this->thumbnail)[3], 'productThumbnail');
            $product->thumbnail = $this->tempThumbnail->store('images/products/thumbnail', 'public');
        }

        $product->category = $this->category;
        $product->promo_price = $this->promoPrice === null ? 0 : $this->promoPrice;
        $product->price = $this->price;
        $product->is_new = $this->isNew ? 1 : 0;

        if ($this->tempBrochure) {
            $this->deleteMedia(explode('/', $this->brochure)[3], 'productBrochure');
            $product->brochure = $this->tempBrochure->store('files/products/brochure', 'public');
        }

        $product->is_draft = $this->isDraft ? 1 : 0;
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
        return view('livewire.product.edit.information', [
            'categories' => $this->getCategories(),
        ]);
    }
}