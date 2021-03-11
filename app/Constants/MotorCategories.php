<?php

namespace App\Constants;

class MotorCategories
{
    const CATEGORIES = [
        ['name' => 'Cub', 'slug_name' => 'cub'],
        ['name' => 'Matic', 'slug_name' => 'matic'],
        ['name' => 'Sport', 'slug_name' => 'sport'],
        ['name' => 'BigBike', 'slug_name' => 'bigbike'],
    ];

    public function getAll()
    {
        return collect(self::CATEGORIES);
    }

    public function getOnlyName()
    {
        $categories = self::CATEGORIES;
        return array_map(function ($category) {
            return $category['name'];
        }, $categories);
    }

    public function getOnlySlug()
    {
        $categories = self::CATEGORIES;
        return array_map(function ($category) {
            return $category['slug_name'];
        }, $categories);
    }
}