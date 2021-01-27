<?php

namespace Modules\Product\Repository;

interface ProductRepositoryInterface
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
     * Store product to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Find product by passing id
     *
     * @param string $id
     * @return void
     */
    public function findById($id);

    /**
     * Update product from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete product from resource
     *
     * @param string $id
     * @return void
     */
    public function destroy($id);
}