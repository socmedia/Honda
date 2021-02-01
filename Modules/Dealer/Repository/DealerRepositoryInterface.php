<?php

namespace Modules\Dealer\Repository;

interface DealerRepositoryInterface
{
    public function getAll($request);
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function delete($id);
}