<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Product\Http\Requests\ProductInformationRequest;
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
        $products = $this->model->getAll($request);
        return view('product::index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $product = '';
        if ($request->id) {
            $product = $this->model->findById($request->id);
        }
        return view('product::create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductInformationRequest $request)
    {
        $product_id = Str::uuid()->getHex();
        $request->product_id = $product_id;
        $route = route('adm.product.create');

        $this->model->create($request);

        return redirect()->to($route . '?id=' . $product_id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
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