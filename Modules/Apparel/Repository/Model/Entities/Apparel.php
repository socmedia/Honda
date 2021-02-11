<?php

namespace Modules\Apparel\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Apparel extends Model
{
    protected $fillable = [
        'name', 'slug_name', 'category', 'materials', 'price', 'sizes', 'thumbnail', 'is_active',
    ];

    public function images()
    {
        return $this->hasMany(ApparelHasImage::class, 'apparels_id', 'id');
    }
}