<?php

namespace Modules\HGP\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GenuinePart extends Model
{
    protected $fillable = [
        'name', 'slug_name', 'thumbnail', 'description_image', 'description', 'function_image', 'function',
    ];

    public function advantages()
    {
        return $this->hasMany(GenuinePartHasAdvantage::class, 'genuine_parts_id', 'id');
    }
}