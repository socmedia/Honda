<?php

namespace Modules\Article\Repository\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'title', 'slug_title', 'blog_type', 'tags',
        'image', 'subject', 'description', 'viewer', 'published',
    ];
}