<?php

namespace Modules\Dealer\Repository;

interface DealerRepositoryInterface
{
    /**
     * Get datas from resource
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function getAll($request);

    /**
     * Find dealer by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Store dealer to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Update dealer from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete dealer from resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}