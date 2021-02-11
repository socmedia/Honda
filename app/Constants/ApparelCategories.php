<?php

namespace App\Constants;

class ApparelCategories
{
    const CATEGORIES = [
        ['name' => 'Helmet', 'slug_name' => 'helmet'],
        ['name' => 'Jacket', 'slug_name' => 'jacket'],
        ['name' => 'Accesories', 'slug_name' => 'accesories'],
        ['name' => 'Outfit', 'slug_name' => 'outfit'],
    ];

    public function getAll()
    {
        return collect(self::CATEGORIES);
    }
}