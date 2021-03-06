<?php

namespace App\Http\Livewire\Ahass;

use App\Models\Indonesia\Regency;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Ahass\Repository\Model\Entities\Ahass;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10;

    public $city;

    public $search = '';

    public function getAll($city, $search)
    {
        $ahass = Ahass::orderBy('name', 'asc');

        if ($city) {
            $ahass->where('regency_id', $city);
        }

        if ($search !== '') {
            $ahass->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('contacts', 'like', '%' . $search . '%');
        }

        return $ahass->with('regency')->simplePaginate($this->perPage);
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
        return view('livewire.ahass.table', [
            'datas' => $this->getAll($this->city, $this->search),
            'cities' => $this->regencies(),
        ]);
    }
}