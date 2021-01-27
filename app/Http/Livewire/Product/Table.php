<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Repository\Model\Entities\Product;

class Table extends Component
{
    use WithPagination;

    // protected $datas;

    public $search = '';

    public $perPage = 5;

    public $status = '';

    public $category = '';

    public function mount()
    {
        // $this->datas = ;
    }

    public function getAll($search, $status, $category)
    {
        $products = Product::orderBy('name', 'asc');

        if ($search !== '') {
            $products->where('name', 'like', '%' . $search . '%');
            $products->orWhere('category', 'like', '%' . $search . '%');
            $products->orWhere('price', 'like', '%' . $search . '%');
        }

        if ($status !== '') {
            $products->where('is_draft', $status);
        }

        if ($category !== '') {
            $products->where('category', $category);
        }

        return $products->simplePaginate($this->perPage);
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.product.table', [
            'datas' => $this->getAll(
                $this->search,
                $this->status,
                $this->category
            ),
        ]);
    }
}