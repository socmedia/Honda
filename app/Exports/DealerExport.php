<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Dealer\Repository\Model\Entities\Dealer;

class DealerExport implements FromView
{
    public function view(): View
    {
        return view('dealer::export.excel', [
            'dealers' => Dealer::with('regency')->get(),
        ]);
    }
}