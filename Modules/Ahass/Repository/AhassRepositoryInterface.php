<?php

namespace Modules\Ahass\Repository;

interface AhassRepositoryInterface
{
    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public function getAll($request);

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function findById($id);

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @return void
     */
    public function create($request);

    /**
     * Undocumented function
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id);
}