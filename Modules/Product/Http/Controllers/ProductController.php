<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Product\Repository\Model\Entities\Product;
use Modules\Product\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->model = $productRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        return view('product::index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $product = $this->model->findById($id);
        $engine = $product->engine;
        $frame = $product->frame_n_feet;
        $dimension = $product->dimensions_and_weight;
        $electricity = $product->electricity;
        $capacity = $product->capacity;
        return view('product::show', compact('product', 'engine', 'frame', 'dimension', 'electricity', 'capacity'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = $this->model->findById($id);
        return view('product::edit', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->model->destroy($id);
        return redirect()->route('adm.product.index')->with('success', 'Produk berhasil dihapus');
    }
}