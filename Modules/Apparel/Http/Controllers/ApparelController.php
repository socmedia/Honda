<?php

namespace Modules\Apparel\Http\Controllers;

use App\Constants\ApparelCategories;
use App\Exports\ApparelExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Apparel\Http\Requests\ApparelImageRequest;
use Modules\Apparel\Http\Requests\ApparelRequest;
use Modules\Apparel\Repository\ApparelRepositoryInterface;

class ApparelController extends Controller
{
    private $model;

    public $categories;

    /**
     * Class constructor.
     */
    public function __construct(
        ApparelRepositoryInterface $apparelRepositoryInterface
    ) {
        $this->model = $apparelRepositoryInterface;
        $this->categories = new ApparelCategories();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('apparel::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = $this->categories->getAll();
        return view('apparel::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ApparelRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.apparel.index')->with('success', 'Apparel berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeImage(ApparelImageRequest $request, $id)
    {
        $this->model->createImage($request, $id, 'PUT');
        return redirect()->back()->with('success', 'Apparel berhasil ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $apparel = $this->model->findById($id);
        return view('apparel::show', compact('apparel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $categories = $this->categories->getAll();
        $apparel = $this->model->findById($id);
        return view('apparel::edit', compact('categories', 'apparel'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editImage($id)
    {
        $apparel = $this->model->findById($id);
        return view('apparel::edit-image', compact('apparel'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ApparelRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.apparel.index')->with('success', 'Apparel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.apparel.index')->with('success', 'Apparel berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroyImage($id)
    {
        $this->model->deleteImage($id);
        return back()->with('success', 'Gambar apparel berhasil dihapus!');
    }

    /**
     * Export resource become excel
     *
     * @return excel
     */
    public function exportAsExcel()
    {
        return Excel::download(new ApparelExport, 'apparel_' . now()->format('dmYHis') . '.xlsx');
    }
}