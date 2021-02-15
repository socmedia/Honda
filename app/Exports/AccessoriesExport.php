<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Accessories\Repository\Model\Entities\Accessory;

class AccessoriesExport implements FromView
{
    public function view(): View
    {
        return view('accessories::export.excel', [
            'accessories' => Accessory::orderBy('name', 'asc')->with('product')->get(),
        ]);
    }
}