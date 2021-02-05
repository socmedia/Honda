<?php

namespace Modules\HGP\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GenuinePartHasAdvantage extends Model
{
    protected $table = 'genuine_part_has_advantages';

    protected $fillable = [
        'genuine_parts_id', 'title', 'description',
    ];

    public function genuinePart()
    {
        return $this->belongsTo(GenuinePart::class, 'genuine_parts_id', 'id');
    }

}