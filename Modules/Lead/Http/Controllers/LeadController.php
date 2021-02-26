<?php

namespace Modules\Lead\Http\Controllers;

use App\Constants\LeadStatus;
use App\Exports\LeadExport;
use App\Models\Indonesia\Regency;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Lead\Repository\LeadRepositoryInterface;
use Modules\Product\Repository\Model\Entities\Product;

class LeadController extends Controller
{
    private $model;
    private $status;

    /**
     * Class constructor.
     */
    public function __construct(
        LeadRepositoryInterface $leadRepositoryInterface,
        LeadStatus $leadStatus
    ) {
        $this->model = $leadRepositoryInterface;
        $this->status = $leadStatus;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('lead::index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $lead = $this->model->findById($id);
        $statuses = $this->status->getAll();
        $products = Product::orderBy('name')->get(['id', 'name']);
        $regencies = Regency::orderBy('name')->get(['id', 'name']);
        return view('lead::edit', compact('lead', 'statuses', 'products', 'regencies'));
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
        return redirect()->route('adm.lead.index')->with('success', 'Lead berhasil diperbarui.');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        if (request()->date) {
            return Excel::download(new LeadExport(request()->date, request()->custom_date), 'lead_' . now()->format('dmYHis') . '.xlsx');
        }

        return abort(404);
    }
}