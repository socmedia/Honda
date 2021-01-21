<?php

namespace Modules\Banner\Repository;

interface BannerRepositoryInterface
{
    public function getAll();

    public function findById();

    public function create();

    public function update();

    public function delete();
}