<?php

namespace Modules\Banner\Http\Controllers;

use App\Exports\BannerExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('banner::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('banner::create');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('banner::edit');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new BannerExport, 'banner.xlsx');
    }
}