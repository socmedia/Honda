<?php
namespace Modules\Banner\Repository\Model;

use Modules\Banner\Repository\BannerRepositoryInterface;
use Modules\Banner\Repository\Model\Entities\Banner;

class BannerModel implements BannerRepositoryInterface
{
    public function getAll()
    {
        $banners = Banner::orderBy('created_at', 'desc');
        return $banners->get();
    }

    public function findById()
    {
//
    }

    public function create()
    {
//
    }

    public function update()
    {
//
    }

    public function delete()
    {
//
    }
}