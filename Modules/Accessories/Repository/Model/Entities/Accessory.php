<?php

namespace Modules\Accessories\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Repository\Model\Entities\Product;

class Accessory extends Model
{
    public $table = 'accessories';

    public $incrementing = false;

    protected $fillable = [
        'id', 'products_id', 'parts_number', 'name', 'slug_name', 'function', 'colors', 'material', 'price', 'image', 'show_in_catalogue',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}