<?php

namespace App\Constants;

class IsPublish
{
    const STATUS = [
        ['name' => 'Publish', 'slug_name' => 'publish'],
        ['name' => 'Draft', 'slug_name' => 'draft'],
    ];

    public function getAll()
    {
        return collect(self::STATUS);
    }

    public function getLabel($status)
    {
        switch ($status) {
            case 'publish':
                return '<small class="px-2 py-1 bg-dark text-white rounded">Publish</small>';
                break;
            case 'draft':
                return '<small class="px-2 py-1 bg-primary text-white rounded">Draft</small>';
                break;
            default:
                return '<small class="px-2 py-1 bg-secondary text-white rounded">-</small>';
                break;
        }
    }
}