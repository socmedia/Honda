<?php

namespace Modules\Product\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    protected $fillable = [
        'products_id', 'image_name', 'title', 'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}