<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Lead\Repository\Model\Entities\Lead;

class LeadExport implements FromView
{
    public $date, $dateRange;

    /**
     * Class constructor.
     */
    public function __construct($date, $dateRange)
    {
        $this->date = $date;
        $this->dateRange = $dateRange;
    }

    public function findLead($date, $dateRange)
    {
        $lead = Lead::orderBy('created_at', 'asc')->with('regency', 'product');

        if ($date === 'today') {
            $lead->where('created_at', 'like', '%' . now()->format('y-m-d') . '%');
        } elseif ($date === 'this_week') {
            $lead->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($date === 'this_month') {
            $lead->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()]);
        } elseif ($date === 'custom') {
            if (count(explode(' - ', $dateRange)) == 2) {
                $lead->whereBetween('created_at', explode(' - ', $dateRange));
            }
        }

        return $lead->get();
    }

    public function view(): View
    {
        return view('lead::export.excel', [
            'leads' => $this->findLead($this->date, $this->dateRange),
        ]);
    }
}