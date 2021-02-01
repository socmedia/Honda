<?php

namespace App\Http\Livewire\Dealer;

use App\Models\Indonesia\Regency;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Dealer\Repository\Model\Entities\Dealer;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $city;

    public $search = '';

    public function getAll($city, $search)
    {
        $dealer = Dealer::orderBy('name', 'asc');

        if ($city) {
            $dealer->where('regency_id', $city);
        }

        if ($search !== '') {
            $dealer->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('contacts', 'like', '%' . $search . '%');
        }

        return $dealer->with('regency')->simplePaginate($this->perPage);
    }

    public function regencies()
    {
        return Regency::where('province_id', 33)->get();
    }

    public function resetSearch()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.dealer.table', [
            'datas' => $this->getAll($this->city, $this->search),
            'cities' => $this->regencies(),
        ]);
    }
}