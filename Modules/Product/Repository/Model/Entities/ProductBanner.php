<?php

namespace Modules\Product\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductBanner extends Model
{
    protected $fillable = [
        'products_id', 'banner_name', 'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}