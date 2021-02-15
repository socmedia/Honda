<?php

namespace Modules\Product\Repository\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Product\Repository\Model\Entities\Product;
use Modules\Product\Repository\ProductRepositoryInterface;

class ProductModel implements ProductRepositoryInterface
{
    public function getAll($request)
    {
        $products = Product::orderBy('name', 'asc');
        return $products->simplePaginate(12);
        // if($request->)
    }

    public function getOnlyIdNName()
    {
        $product = Product::orderBy('name', 'asc');
        return $product->get(['id', 'name']);
    }

    public function create($request)
    {
        $product = new Product();
        $product->id = $request->product_id;
        $product->name = $request->name;
        $product->slug_name = Str::slug($request->name);
        $product->category = $request->category;
        $product->promo_price = $request->promo_price === null ? 0 : $request->promo_price;
        $product->price = $request->price;
        $product->is_new = $request->new_product ? 1 : 0;
        $product->is_draft = 1;
        return $product->save();
    }

    public function findById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function update($request, $id)
    {
        $product = $this->findById($id);

        if ($request->banners) {
            foreach ($request->file('banners') as $banner) {
                foreach ($banner as $banner) {
                    ProductBanner::create([
                        'products_id' => $id,
                        'banner_name' => $this->uploadImage($banner),
                        'is_active' => 1,
                    ]);
                }
            }
        }

        if ($request->varians) {
            foreach ($request->file('varians') as $varian) {
                foreach ($varian as $varian) {
                    ProductVarian::create([
                        'products_id' => $id,
                        'image_name' => $this->uploadImage($varian),
                        'is_active' => 1,
                    ]);
                }
            }
        }

        if ($request->features) {
            foreach ($request->features as $feature) {
                $arr = [];
                foreach ($feature as $item) {
                    array_push($arr, $item);
                }

                ProductFeature::create([
                    'products_id' => $id,
                    'image_name' => $this->uploadImage($arr[2]),
                    'title' => $arr[0],
                    'description' => $arr[1],
                ]);
            }
        }

        if ($request->file('thumbnail')) {
            $product->thumbnail = $this->uploadImage($request->thumbnail);
        }

        $product->engine = $request->engine;
        $product->frame_n_feet = $request->frame;
        $product->dimensions_and_weight = $request->dimensions;
        $product->capacity = $request->capacity;
        $product->electricity = $request->electricity;
        $product->is_draft = 0;
        return $product->save();

    }

    public function destroy($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }

    protected function uploadImage($inputName)
    {
        $name = 'prd_' . time() . '_' . random_int(100, 999) . '.' . $inputName->getClientOriginalExtension();
        $inputName->move(storage_path('app/public/images/products/'), $name);
        return $name;
    }

    protected function deleteBanner($imageName)
    {
        $storage = Storage::disk('productImages');
        return $storage->delete($imageName);
    }
}