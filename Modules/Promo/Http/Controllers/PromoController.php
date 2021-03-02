<?php

namespace Modules\Promo\Http\Controllers;

use App\Constants\BlogType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Article\Http\Requests\PromoRequest;
use Modules\Promo\Repository\PromoRepositoryInterface;

class PromoController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(PromoRepositoryInterface $promoRepositoryInterface)
    {
        $this->model = $promoRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('promo::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $types = new BlogType();
        return view('promo::create', ['types' => $types->getAll()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PromoRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.promo.index')->with('success', 'Promo/Event berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        $promo = $this->model->findBySlug($slug);
        return view('promo::show', [
            'promo' => $promo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($slug)
    {
        $types = new BlogType();
        $promo = $this->model->findBySlug($slug);
        return view('promo::edit', [
            'types' => $types->getAll(),
            'promo' => $promo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PromoRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.promo.index')->with('success', 'Promo/Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.promo.index')->with('success', 'Promo/Event berhasil dihapus.');
    }
}