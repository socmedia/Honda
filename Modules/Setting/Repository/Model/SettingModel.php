<?php

namespace Modules\Setting\Repository\Model;

use App\Models\Contact;
use Modules\Setting\Repository\SettingRepositoryInterface;

class SettingModel implements SettingRepositoryInterface
{
    public function getInfo()
    {
        return Contact::all();
    }
    public function getSocials()
    {
        return Contact::all();
    }
    public function updateInfo()
    {
        return Contact::all();
    }
    public function updateInstagram()
    {
        return Contact::all();
    }
    public function updateFacebook()
    {
        return Contact::all();
    }
    public function updateYoutube()
    {
        return Contact::all();
    }
    public function updateTwitter()
    {
        return Contact::all();
    }
    public function updateTikTok()
    {
        return Contact::all();
    }
}