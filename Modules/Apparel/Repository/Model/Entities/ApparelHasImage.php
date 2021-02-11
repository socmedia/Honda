<?php

namespace Modules\Apparel\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ApparelHasImage extends Model
{
    protected $fillable = [
        'apparels_id', 'image',
    ];

    public function apparel()
    {
        return $this->belongsTo(Appparel::class, 'apparels_id', 'id');
    }
}