<?php

namespace App\Http\Livewire\HGP;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\HGP\Repository\Model\Entities\GenuinePart;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $search = '';

    public function getAll($search)
    {
        $hgp = GenuinePart::orderBy('name', 'asc');

        if ($search !== '') {
            $hgp->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('function', 'like', '%' . $search . '%');
        }

        return $hgp->simplePaginate($this->perPage);
    }

    public function resetSearch()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.h-g-p.table', [
            'datas' => $this->getAll($this->search),
        ]);
    }
}