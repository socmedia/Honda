<?php

namespace Modules\Banner\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    /**
     * Fillable column
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image_name', 'page_target', 'alt', 'description', 'is_active', 'active_until',
    ];

    public static function search($keyword)
    {
        return empty($keyword) ? static::query() : static::query()
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orWhere('alt', 'like', '%' . $keyword . '%');
    }
}