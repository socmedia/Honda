<?php

namespace Modules\Promo\Repository;

interface PromoRepositoryInterface
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
     * Find promo by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find promo by passing slug_title
     *
     * @param int $id
     * @return void
     */
    public function findBySlug($slug);

    /**
     * Store promo to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Update promo from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete promo from resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}