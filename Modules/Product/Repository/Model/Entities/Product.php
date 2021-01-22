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
        return $this->hasMany(ProductBanner::class, 'id', 'product_id');
    }

    public function features()
    {
        return $this->hasMany(ProductFeature::class, 'id', 'product_id');
    }

    public function varians()
    {
        return $this->hasMany(ProductVarian::class, 'id', 'product_id');
    }
}