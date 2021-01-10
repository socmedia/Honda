<?php

namespace App\Http\Livewire\Setting;

use App\Models\Contact;
use Livewire\Component;
use Modules\Setting\Repository\SettingRepositoryInterface;

class UpdateInfo extends Component
{
    private $model;

    public $data, $address, $phone, $fax, $selected_id;

    public function mount(SettingRepositoryInterface $settingRepositoryInterface)
    {
        $this->model = $settingRepositoryInterface;
        $this->data = $this->model->getInfo();

        $this->selected_id = $this->data->id;
        $this->address = $this->data->description;
        $this->phone = $this->data->phone;
        $this->fax = $this->data->fax;
    }

    public function updateInfo()
    {
        $this->validate([
            'address' => 'required|min:5',
            'phone' => 'required|numeric|min:7',
            'fax' => 'required|numeric|min:7',
        ]);

        if ($this->selected_id) {
            $info = Contact::findOrFail($this->selected_id);
            $info->update([
                'description' => $this->address,
                'phone' => $this->phone,
                'fax' => $this->fax,
            ]);

            session()->flash('info', 'Informasi perusahaan berhasil diperbarui !');
        }
    }

    public function render()
    {
        return view('livewire.setting.update-info', [
            'info' => $this->data,
        ]);
    }
}