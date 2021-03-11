<?php

namespace Modules\Product\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'slug_name', 'category', 'is_new', 'promo_price', 'price', 'engine',
        'frame_n_feet', 'dimensions_and_weight', 'capacity', 'electricity', 'is_draft', 'brochure',
    ];

    public function banners()
    {
        return $this->hasMany(ProductBanner::class, 'products_id', 'id')->select(['products_id', 'banner_name']);
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'products_id', 'id')->select(['products_id', 'image_name', 'title', 'description']);
    }

    public function varians()
    {
        return $this->hasMany(ProductVarian::class, 'products_id', 'id')->select(['products_id', 'image_name']);
    }
}