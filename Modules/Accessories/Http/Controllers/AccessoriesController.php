<?php

namespace Modules\Accessories\Http\Controllers;

use App\Exports\AccessoriesExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Accessories\Http\Requests\AccessoriesRequest;
use Modules\Accessories\Repository\AccessoryRepositoryInterface;
use Modules\Product\Repository\ProductRepositoryInterface;

class AccessoriesController extends Controller
{
    private $product;

    private $model;

    /**
     * Class constructor.
     */
    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface,
        AccessoryRepositoryInterface $accessoryRepositoryInterface
    ) {
        $this->product = $productRepositoryInterface;
        $this->model = $accessoryRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('accessories::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $products = $this->product->getOnlyIdNName();
        return view('accessories::create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AccessoriesRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.accessories.index')->with('success', 'Aksesoris berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $accessory = $this->model->findById($id);
        return view('accessories::show', compact('accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $products = $this->product->getOnlyIdNName();
        $accessory = $this->model->findById($id);
        return view('accessories::edit', compact('products', 'accessory'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AccessoriesRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.accessories.index')->with('success', 'Aksesoris berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.accessories.index')->with('success', 'Aksesoris berhasil dihapus.');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new AccessoriesExport, 'accessories_' . now()->format('dmYHis') . '.xlsx');
    }
}