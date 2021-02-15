<?php

namespace Modules\Accessories\Repository;

interface AccessoryRepositoryInterface
{
    /**
     * Get all accessories from resource
     *
     * @param collection $request
     * @return void
     */
    public function getAll($request);

    /**
     * Find accessory from resource by passing id
     *
     * @param string $id
     * @return void
     */
    public function findById($id);

    /**
     * Find accessory from resource by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlugName($slug);

    /**
     * Store accessory on resource
     *
     * @param collection $request
     * @return void
     */
    public function create($request);

    /**
     * Update accessory on resource
     *
     * @param collection $request
     * @param string $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete accessory from resource
     *
     * @param string $id
     * @return void
     */
    public function delete($id);
}