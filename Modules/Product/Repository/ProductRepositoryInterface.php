<?php

namespace Modules\Product\Repository;

interface ProductRepositoryInterface
{
    /**
     * Get datas from resource
     *
     *
     * @return void
     */
    public function getOnlyIdNName();

    /**
     * Find product by passing id
     *
     * @param string $id
     * @return void
     */
    public function findById($id);

    /**
     * Delete product from resource
     *
     * @param string $id
     * @return void
     */
    public function destroy($id);
}