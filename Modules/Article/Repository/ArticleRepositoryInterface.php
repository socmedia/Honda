<?php

namespace Modules\Article\Repository;

interface ArticleRepositoryInterface
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
     * Find article by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find article by passing slug_title
     *
     * @param int $id
     * @return void
     */
    public function findBySlug($slug);

    /**
     * Store article to resource
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Update article from resource
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete article from resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}