<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\HGP\Repository\Model\Entities\GenuinePart;

class GenuinePartExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('hgp::export.excel', [
            'hgp' => GenuinePart::with('advantages')->get(),
        ]);
    }
}