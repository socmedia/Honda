<?php

namespace App\Http\Livewire\Accessory;

use Livewire\Component;
use Modules\Accessories\Repository\Model\Entities\Accessory;
use Modules\Product\Repository\Model\Entities\Product;

class Table extends Component
{
    public $search, $product;

    public function getAllProducts()
    {
        $product = Product::orderBy('name', 'asc');
        return $product->get(['id', 'name']);
    }

    public function getAll($product, $search)
    {
        $accessories = Accessory::orderBy('created_at', 'asc');

        if ($product !== '') {
            $accessories->where('products_id', $product);
        }

        if ($search !== '') {
            $accessories->where('name', 'like', '%' . $search . '%');
            $accessories->orWhere('colors', 'like', '%' . $search . '%');
            $accessories->orWhere('material', 'like', '%' . $search . '%');
            $accessories->orWhere('function', 'like', '%' . $search . '%');
        }

        return $accessories->simplePaginate(10);
    }

    public function render()
    {
        return view('livewire.accessory.table', [
            'products' => $this->getAllProducts(),
            'datas' => $this->getALl($this->product, $this->search),
        ]);
    }
}