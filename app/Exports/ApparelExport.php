<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Apparel\Repository\Model\Entities\Apparel;

class ApparelExport implements FromView
{
    public function view(): View
    {
        return view('apparel::export.excel', [
            'apparels' => Apparel::with('images')->orderBy('name', 'asc')->get(),
        ]);
    }
}