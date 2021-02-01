<?php

namespace Modules\Ahass\Repository;

interface AhassRepositoryInterface
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
     * Find ahass by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Store ahass to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Update ahass from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete ahass from resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}