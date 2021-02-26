<?php

namespace App\Http\Livewire\Lead;

use App\Constants\LeadStatus;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Lead\Repository\Model\Entities\Lead;

class Table extends Component
{
    use WithPagination;

    public $dateStart = '', $dateEnd = '', $search = '';

    public function getAll($date, $search)
    {
        $lead = Lead::orderBy('created_at', 'desc');

        if ($date[0] !== '' && $date[1] === '') {
            $lead->where('created_at', 'like', '%' . $date[0] . '%');
        }

        if ($date[0] !== '' && $date[1] !== '') {
            $lead->whereBetween('created_at', [$date[0] . ' 00:00:00', $date[1] . ' 00:00:00']);
        }

        if ($search !== '') {
            $lead->where('name', 'like', '%' . $search . '%');
            $lead->orWhere('phone', 'like', '%' . $search . '%');
            $lead->orWhere('created_at', 'like', '%' . $search . '%');
        }

        return $lead->simplePaginate(10);
    }

    public function cities()
    {
        // return Regency::all(['id', 'name']);
    }

    public function render()
    {
        return view('livewire.lead.table', [
            // 'cities' => $this->cities(),
            'datas' => $this->getAll([$this->dateStart, $this->dateEnd], $this->search),
            'label' => new LeadStatus(),
        ]);
    }
}