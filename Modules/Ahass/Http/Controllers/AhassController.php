<?php

namespace Modules\Ahass\Http\Controllers;

use App\Exports\AhassExport;
use App\Models\Indonesia\Regency;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Ahass\Http\Requests\AhassRequest;
use Modules\Ahass\Repository\AhassRepositoryInterface;

class AhassController extends Controller
{
    private $model;

    private $regencies;

    /**
     * Class constructor.
     */
    public function __construct(AhassRepositoryInterface $ahassRepositoryInterface)
    {
        $this->model = $ahassRepositoryInterface;
        $this->regencies = Regency::where('province_id', 33)->get();
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ahass::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $regencies = $this->regencies;
        return view('ahass::create', compact('regencies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AhassRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.ahass.index')->with('success', 'Ahass berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $ahass = $this->model->findById($id);
        $regencies = $this->regencies;
        return view('ahass::edit', compact('ahass', 'regencies'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AhassRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.ahass.index')->with('success', 'Ahass berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.ahass.index')->with('success', 'Ahass berhasil dihapus.');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new AhassExport, 'ahass_' . now()->format('dmYHis') . '.xlsx');
    }
}