<?php

namespace Modules\Ahass\Http\Controllers;

use App\Models\Indonesia\Regency;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ahass\Http\Requests\AhassRequest;
use Modules\Ahass\Repository\AhassRepositoryInterface;

class AhassController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(AhassRepositoryInterface $ahassRepositoryInterface)
    {
        $this->model = $ahassRepositoryInterface;
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
        $regencies = Regency::where('province_id', 33)->get();
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
        return view('ahass::edit', compact('ahass'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}