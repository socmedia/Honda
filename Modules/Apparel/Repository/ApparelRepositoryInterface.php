<?php

namespace Modules\Apparel\Repository;

interface ApparelRepositoryInterface
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
     * Find genuine part by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Store genuine part to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Store genuine part to resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function createImage($request, $id = null, $method = 'POST');

    /**
     * Update genuine part from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete genuine part from resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * Delete genuine part from resource
     *
     * @param int $id
     * @return void
     */
    public function deleteImage($id);
}