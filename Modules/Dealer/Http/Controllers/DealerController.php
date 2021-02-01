<?php

namespace Modules\Dealer\Http\Controllers;

use App\Exports\DealerExport;
use App\Models\Indonesia\Regency;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Dealer\Http\Requests\DealerRequest;
use Modules\Dealer\Repository\DealerRepositoryInterface;

class DealerController extends Controller
{
    private $model;

    private $regencies;

    /**
     * Class constructor.
     */
    public function __construct(DealerRepositoryInterface $dealerRepositoryInterface)
    {
        $this->model = $dealerRepositoryInterface;
        $this->regencies = Regency::orderBy('name', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dealer::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $regencies = $this->regencies;
        return view('dealer::create', compact('regencies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DealerRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.dealer.index')->with('success', 'Dealer berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $dealer = $this->model->findById($id);
        $regencies = $this->regencies;
        return view('dealer::edit', compact('dealer', 'regencies'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DealerRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.dealer.index')->with('success', 'Dealer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.dealer.index')->with('success', 'Dealer berhasil dihapus.');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new DealerExport, 'dealer_' . now()->format('dmYHis') . '.xlsx');
    }
}