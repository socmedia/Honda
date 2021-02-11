<?php

namespace Modules\HGP\Http\Controllers;

use App\Exports\GenuinePartExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\HGP\Http\Requests\AdvantageRequest;
use Modules\HGP\Http\Requests\GenuinePartRequest;
use Modules\HGP\Repository\GenuinePartRepositoryInterface;

class HGPController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(GenuinePartRepositoryInterface $genuinePartRepositoryInterface)
    {
        $this->model = $genuinePartRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('hgp::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('hgp::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(GenuinePartRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.hgp.index')->with('success', 'Genuine Part berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeAdvantage(AdvantageRequest $request, $id)
    {
        $this->model->createAdvantage($request, $id);
        return redirect()->back()->with('success', 'Keunggulan genuine part berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $hgp = $this->model->findById($id);
        return view('hgp::show', compact('hgp'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $hgp = $this->model->findById($id);
        return view('hgp::edit', compact('hgp'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editAdvantage($id)
    {
        $hgp = $this->model->findById($id);
        return view('hgp::edit-advantage', compact('hgp'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.hgp.index')->with('success', 'Genuine Part berhasil diperbarui.');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @param int $advantageId
     * @return Renderable
     */
    public function updateAdvantage(AdvantageRequest $request, $id)
    {
        $this->model->updateAdvantage($request, $id);
        return redirect()->back()->with('success', 'Keunggulan genuine part berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->back()->with('success', 'Genuine Part berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyAdvantage($id)
    {
        $this->model->deleteAdvantage($id);
        return redirect()->back()->with('success', 'Keunggulan genuine part berhasil dihapus.');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new GenuinePartExport, 'genuine_part_' . now()->format('dmYHis') . '.xlsx');
    }
}