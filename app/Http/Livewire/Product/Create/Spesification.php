<?php

namespace App\Http\Livewire\Product\Create;

use App\Constants\MotorSpesifications;
use Livewire\Component;
use Modules\Product\Repository\Model\Entities\Product;

class Spesification extends Component
{
    public $productId, $engine, $frame, $dimension, $capacity, $electricity;

    public $t_engine, $t_frame, $t_dimension, $t_capacity, $t_electricity;

    public function mount($productId, MotorSpesifications $motorSpesifications)
    {
        $this->productId = $productId;
        $this->engine = $motorSpesifications->engine();
        $this->frame = $motorSpesifications->frame();
        $this->dimension = $motorSpesifications->dimension();
        $this->capacity = $motorSpesifications->capacity();
        $this->electricity = $motorSpesifications->electricity();
        $this->t_engine = $motorSpesifications->engineTemplate();
        $this->t_frame = $motorSpesifications->frameTemplate();
        $this->t_dimension = $motorSpesifications->dimensionTemplate();
        $this->t_capacity = $motorSpesifications->capacityTemplate();
        $this->t_electricity = $motorSpesifications->electricityTemplate();
    }

    protected $rules = [
        'engine.*' => 'nullable|min:3|max:191',
        'frame.*' => 'nullable|min:3|max:191',
        'dimension.*' => 'nullable|min:3|max:191',
        'electricity.*' => 'nullable|min:3|max:191',
        'capacity.*' => 'nullable|min:3|max:191',
    ];

    protected $messages = [
        'engine.*.min' => 'This field must be at least 3 characters.',
        'frame.*.min' => 'This field must be at least 3 characters.',
        'dimension.*.min' => 'This field must be at least 3 characters.',
        'electricity.*.min' => 'This field must be at least 3 characters.',
        'capacity.*.min' => 'This field must be at least 3 characters.',

        'engine.*.max' => 'This field may not be greater than 191 characters.',
        'frame.*.max' => 'This field may not be greater than 191 characters.',
        'dimension.*.max' => 'This field may not be greater than 191 characters.',
        'electricity.*.max' => 'This field may not be greater than 191 characters.',
        'capacity.*.max' => 'This field may not be greater than 191 characters.',
    ];

    public function saveSpesification()
    {
        $this->validate();
        $this->createSpesification($this->productId);
        session()->flash('success', 'Produk berhasil ditambahkan.');
        redirect()->route('adm.product.index');
    }

    public function createSpesification($id)
    {
        $feature = Product::find($id);
        $feature->engine = $this->engine;
        $feature->frame_n_feet = $this->frame;
        $feature->dimensions_and_weight = $this->dimension;
        $feature->capacity = $this->capacity;
        $feature->electricity = $this->electricity;
        $feature->is_draft = 0;
        $feature->save();
    }

    public function render()
    {
        return view('livewire.product.create.spesification', [
            't_engine' => $this->t_engine,
            't_frame' => $this->t_frame,
            't_dimension' => $this->t_dimension,
            't_capacity' => $this->t_capacity,
            't_electricity' => $this->t_electricity,
        ]);
    }
}