<?php

namespace Modules\Setting\Repository;

interface SettingRepositoryInterface
{
    public function getInfo();
    public function getSocials();
    public function updateInfo();
    public function updateInstagram();
    public function updateFacebook();
    public function updateYoutube();
    public function updateWhatsapp();
    public function updateTikTok();
    public function updateTwitter();
}