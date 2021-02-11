<?php

namespace App\Http\Livewire\Apparel;

use App\Constants\ApparelCategories;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Apparel\Repository\Model\Entities\Apparel;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $search = '';

    public $category = '';

    public function getAll($search, $category)
    {
        $hgp = Apparel::orderBy('name', 'asc');

        if ($search !== '') {
            $hgp->where('name', 'like', '%' . $search . '%')
                ->orWhere('materials', 'like', '%' . $search . '%')
                ->orWhere('sizes', 'like', '%' . $search . '%');
        }

        if ($category !== '') {
            $hgp->where('category', 'like', '%' . $category . '%');
        }

        return $hgp->simplePaginate($this->perPage);
    }

    public function resetSearch()
    {
        $this->reset();
    }

    public function render()
    {
        $categories = new ApparelCategories();
        return view('livewire.apparel.table', [
            'datas' => $this->getAll($this->search, $this->category),
            'categories' => $categories->getAll(),
        ]);
    }
}