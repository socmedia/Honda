<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Repository\Model\Entities\Product;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 10;

    public $status = null;

    public $category = '';

    public function getAll($search, $status, $category)
    {
        $products = Product::orderBy('name', 'asc');

        # Category Query
        if ($category !== '') {
            $products->where(function ($q) use ($category) {
                $q->where('category', $category);
            });
        }

        # Search Query
        if ($search !== '') {
            $products->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%');

            });
        }

        # Filter Publish or Draft Article
        if ($status) {
            $products->where(function ($q) use ($status) {
                $q->where('is_draft', $status);

            });
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