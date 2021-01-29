<?php

namespace App\Http\Livewire\Ahass;

use App\Models\Indonesia\Regency;
use Livewire\Component;
use Modules\Ahass\Repository\Model\Entities\Ahass;

class Table extends Component
{
    public $perPage = 10;

    public $city;

    public $search = '';

    public function getAll($city, $search)
    {
        $ahass = Ahass::orderBy('name', 'asc')->with('regency');
        return $ahass->simplePaginate($this->perPage);

        // if($)
    }

    public function regencies()
    {
        return Regency::where('province_id', 33)->get();
    }

    public function render()
    {
        return view('livewire.ahass.table', [
            'datas' => $this->getAll($this->city, $this->search),
            'cities' => $this->regencies(),
        ]);
    }
}