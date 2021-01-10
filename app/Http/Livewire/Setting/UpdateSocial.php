<?php

namespace App\Http\Livewire\Setting;

use App\Models\Contact;
use Livewire\Component;
use Modules\Setting\Repository\SettingRepositoryInterface;

class UpdateSocial extends Component
{
    private $model;

    public $whatsapp, $instagram, $facebook, $tiktok, $youtube, $twitter,
    $whatsappId, $instagramId, $facebookId, $tiktokId, $youtubeId, $twitterId;

    public function mount(SettingRepositoryInterface $settingRepositoryInterface)
    {
        $this->model = $settingRepositoryInterface;
        $this->whatsapp = $this->model->getWhatsapp()->phone;
        $this->instagram = $this->model->getInstagram()->url;
        $this->facebook = $this->model->getFacebook()->url;
        $this->twitter = $this->model->getTwitter()->url;
        $this->tiktok = $this->model->getTikTok()->url;
        $this->youtube = $this->model->getYoutube()->url;
        $this->whatsappId = $this->model->getWhatsapp()->id;
        $this->instagramId = $this->model->getInstagram()->id;
        $this->facebookId = $this->model->getFacebook()->id;
        $this->twitterId = $this->model->getTwitter()->id;
        $this->tiktokId = $this->model->getTikTok()->id;
        $this->youtubeId = $this->model->getYoutube()->id;

    }

    public function updateWa()
    {
        $this->validate([
            'whatsapp' => 'required|numeric|digits_between:10,13',
        ]);

        if ($this->whatsapp) {
            $wa = Contact::findOrFail($this->whatsappId);
            $wa->update([
                'phone' => $this->whatsapp,
            ]);

            session()->flash('social', 'Whatsapp berhasil diperbarui !');
        }
    }

    public function updateIg()
    {
        $this->validate([
            'instagram' => 'required|url|active_url',
        ]);

        if ($this->instagram) {
            $wa = Contact::findOrFail($this->instagramId);
            $wa->update([
                'url' => $this->instagram,
            ]);

            session()->flash('social', 'Link instagram berhasil diperbarui !');
        }
    }

    public function updateFb()
    {
        $this->validate([
            'facebook' => 'required|url|active_url',
        ]);

        if ($this->facebook) {
            $wa = Contact::findOrFail($this->facebookId);
            $wa->update([
                'url' => $this->facebook,
            ]);

            session()->flash('social', 'Link facebook berhasil diperbarui !');
        }
    }

    public function updateYt()
    {
        $this->validate([
            'youtube' => 'required|url|active_url',
        ]);

        if ($this->youtube) {
            $wa = Contact::findOrFail($this->youtubeId);
            $wa->update([
                'url' => $this->youtube,
            ]);

            session()->flash('social', 'Link youtube berhasil diperbarui !');
        }
    }

    public function updateTt()
    {
        $this->validate([
            'tiktok' => 'required|url|active_url',
        ]);

        if ($this->tiktok) {
            $wa = Contact::findOrFail($this->tiktokId);
            $wa->update([
                'url' => $this->tiktok,
            ]);

            session()->flash('social', 'Link tiktok berhasil diperbarui !');
        }
    }

    public function updateTw()
    {
        $this->validate([
            'twitter' => 'required|url|active_url',
        ]);

        if ($this->twitter) {
            $wa = Contact::findOrFail($this->twitterId);
            $wa->update([
                'url' => $this->twitter,
            ]);

            session()->flash('social', 'Link twitter berhasil diperbarui !');
        }
    }

    public function render()
    {
        return view('livewire.setting.update-social');
    }
}