<?php

namespace Modules\Product\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductVarian extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'products_id', 'image_name', 'is_active',
    ];

    public function porduct()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}