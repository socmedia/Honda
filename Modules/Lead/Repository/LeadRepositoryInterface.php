<?php

namespace Modules\Lead\Repository;

interface LeadRepositoryInterface
{
    /**
     * Get all leads from resource
     *
     * @param collection $request
     * @return void
     */
    public function getAll($request);

    /**
     * Find lead from resource by passing id
     *
     * @param string $id
     * @return void
     */
    public function findById($id);

    /**
     * Update lead on resource
     *
     * @param collection $request
     * @param string $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete lead from resource
     *
     * @param string $id
     * @return void
     */
    public function delete($id);
}