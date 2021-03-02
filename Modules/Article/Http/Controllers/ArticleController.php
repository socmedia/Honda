<?php

namespace Modules\Article\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Article\Http\Requests\ArticleRequest;
use Modules\Article\Repository\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(ArticleRepositoryInterface $articleRepositoryInterface)
    {
        $this->model = $articleRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('article::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('article::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ArticleRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('adm.article.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slugTitle)
    {
        $article = $this->model->findBySlug($slugTitle);
        return view('article::show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($slugTitle)
    {
        $article = $this->model->findBySlug($slugTitle);
        return view('article::edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ArticleRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('adm.article.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('adm.article.index')->with('success', 'Artikel berhasil dihapus.');
    }
}