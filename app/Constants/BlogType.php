<?php

namespace App\Constants;

class BlogType
{
    const TYPE = [
        ['name' => 'Promo', 'slug_name' => 'promo'],
        ['name' => 'Event', 'slug_name' => 'event'],
    ];

    public function getAll()
    {
        return collect(self::TYPE);
    }
}