<?php

namespace App\Http\Livewire;

use App\Models\Indonesia\Regency;
use Livewire\Component;
use Modules\Lead\Repository\Model\Entities\Lead;
use Modules\Product\Repository\Model\Entities\Product;

class LeadForm extends Component
{
    public $fullName = '', $city = '', $phone = '', $motor = '', $message = '';

    public $motors = null;

    public $cities = null;

    protected $rules = [
        'fullName' => 'required|min:3|max:191',
        'city' => 'required',
        'phone' => 'required|regex:/^[0-9 +-]*$/|min:6|max:15',
        'motor' => 'required',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'fullName.required' => 'Nama tidak boleh kosong.',
        'city.required' => 'Kota tidak boleh kosong.',
        'motor.required' => 'Motor yang dipilih tidak boleh kosong.',
        'phone.required' => 'No. Handphone tidak boleh kosong.',
        'message.required' => 'Pesan tidak boleh kosong.',

        'fullName.min' => 'Nama minimal 3 karakter.',
        'phone.min' => 'No. Handphone minimal 6 karakter.',
        'message.min' => 'Pesan minimal 10 karakter.',

        'fullName.max' => 'Nama maksimal 191 karakter.',
        'phone.max' => 'No. Handphone maksimal 15 karakter.',

        'phone.regex' => 'Format No. Handphone salah.',
    ];

    public function mount()
    {
        $this->motors = Product::orderBy('name')->get(['id', 'name']);
        $this->cities = Regency::orderBy('name')->get(['id', 'name']);
    }

    public function submitForm()
    {
        $this->validate();

        Lead::create([
            'name' => $this->fullName,
            'phone' => $this->phone,
            'regency_id' => $this->city,
            'product_id' => $this->motor,
            'note' => $this->message,
            'status' => 'belum diproses',
            'is_readed' => 0,
        ]);

        session()->flash('success');
        $this->reset([
            'fullName',
            'city',
            'motor',
            'phone',
            'message',
        ]);
    }

    public function render()
    {
        return view('livewire.lead-form', [
            'motors' => $this->motors,
            'cities' => $this->cities,
        ]);
    }
}