<?php

namespace Modules\Product\Repository\Model;

use App\Traits\FileHandler;
use Modules\Product\Repository\Model\Entities\Product;
use Modules\Product\Repository\ProductRepositoryInterface;

class ProductModel implements ProductRepositoryInterface
{
    use FileHandler;

    public function getOnlyIdNName()
    {
        $product = Product::orderBy('name', 'asc');
        return $product->get(['id', 'name']);
    }

    public function findById($id)
    {
        $product = Product::where('id', $id)->with('banners', 'varians', 'features');
        return $product->firstOrFail();
    }

    public function destroy($id)
    {
        $product = $this->findById($id);

        $this->deleteMedia(explode('/', $product->thumbnail)[3], 'productThumbnail');
        $this->deleteMedia(explode('/', $product->brochure)[3], 'productBrochure');

        if ($product->banners->count() > 0) {
            foreach ($product->banners as $banner) {
                $this->deleteMedia(explode('/', $banner->banner_name)[3], 'productBanner');
            }
        }

        if ($product->features->count() > 0) {
            foreach ($product->features as $feature) {
                $this->deleteMedia(explode('/', $feature->image_name)[3], 'productFeature');
            }
        }

        if (!$product->varians->count() > 0) {
            foreach ($product->varians as $varian) {
                $this->deleteMedia(explode('/', $varian->image_name)[3], 'productVarian');
            }
        }

        return $product->delete();
    }
}