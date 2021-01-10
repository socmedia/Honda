<?php

namespace Modules\Setting\Repository;

interface SettingRepositoryInterface
{
    /**
     * Get company general info
     *
     * @return void
     */
    public function getInfo();

    /**
     * Get instagram data from resource
     *
     * @return void
     */
    public function getInstagram();

    /**
     * Get facebook data from resource
     *
     * @return void
     */
    public function getFacebook();

    /**
     * Get whatsapp data from resource
     *
     * @return void
     */
    public function getWhatsapp();

    /**
     * Get twitter data from resource
     *
     * @return void
     */
    public function getTwitter();

    /**
     * Get youtube data from resource
     *
     * @return void
     */
    public function getYoutube();

    /**
     * Get tiktok data from resource
     *
     * @return void
     */
    public function getTikTok();

    /**
     * Update company info from resource
     *
     * @return void
     * @param array $data
     */
    public function updateInfo($data);

    /**
     * Update instagram data from resource
     *
     * @return void
     */
    public function updateInstagram();

    /**
     * Update facebook data from resource
     *
     * @return void
     */
    public function updateFacebook();

    /**
     * Update youtube data from resource
     *
     * @return void
     */
    public function updateYoutube();

    /**
     * Update whatsapp data from resource
     *
     * @return void
     */
    public function updateWhatsapp();

    /**
     * Update tiktok data from resource
     *
     * @return void
     */
    public function updateTikTok();

    /**
     * Update twitter data from resource
     *
     * @return void
     */
    public function updateTwitter();

}