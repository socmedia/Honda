<?php

namespace Modules\Setting\Repository\Model;

use App\Models\Contact;
use Modules\Setting\Repository\SettingRepositoryInterface;

class SettingModel implements SettingRepositoryInterface
{
    public function getInfo()
    {
        return Contact::findOrFail(1);
    }

    public function getInstagram()
    {
        return Contact::findOrFail(2);
    }

    public function getFacebook()
    {
        return Contact::findOrFail(3);
    }

    public function getWhatsapp()
    {
        return Contact::findOrFail(4);
    }

    public function getTwitter()
    {
        return Contact::findOrFail(5);
    }

    public function getYoutube()
    {
        return Contact::findOrFail(6);
    }

    public function getTikTok()
    {
        return Contact::findOrFail(7);
    }

    public function updateInfo($data)
    {
        $info = Contact::findOrFail($data['selected_id']);
        $info->description = $data['address'];
        $info->phone = $data['phone'];
        $info->fax = $data['fax'];
        return $info->save();
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

    public function updateWhatsapp()
    {
        return Contact::all();
    }

    public function updateTikTok()
    {
        return Contact::all();
    }
}