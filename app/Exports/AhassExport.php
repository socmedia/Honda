<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Ahass\Repository\Model\Entities\Ahass;

class AhassExport implements FromView
{
    public function view(): View
    {
        return view('ahass::export.excel', [
            'ahass' => Ahass::with('regency')->get(),
        ]);
    }
}