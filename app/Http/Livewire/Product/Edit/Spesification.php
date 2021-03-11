<?php

namespace App\Http\Livewire\Product\Edit;

use App\Constants\MotorSpesifications;
use Livewire\Component;
use Modules\Product\Repository\Model\Entities\Product;

class Spesification extends Component
{
    public $productId, $engine, $frame, $dimension, $capacity, $electricity;

    public $t_engine, $t_frame, $t_dimension, $t_capacity, $t_electricity;

    public $d_engine, $d_frame, $d_dimension, $d_capacity, $d_electricity;

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

        $product = Product::where('id', $this->productId)->select([
            'engine',
            'frame_n_feet',
            'dimensions_and_weight',
            'capacity',
            'electricity',
        ])->first();

        $engine = json_decode($product->engine, true);
        $frame = json_decode($product->frame_n_feet, true);
        $dimension = json_decode($product->dimensions_and_weight, true);
        $capacity = json_decode($product->capacity, true);
        $electricity = json_decode($product->electricity, true);

        foreach ($this->engine as $i => $data) {
            $this->engine[$i] = $engine[$i];
        }

        foreach ($this->frame as $i => $data) {
            $this->frame[$i] = $frame[$i];
        }

        foreach ($this->dimension as $i => $data) {
            $this->dimension[$i] = $dimension[$i];
        }

        foreach ($this->capacity as $i => $data) {
            $this->capacity[$i] = $capacity[$i];
        }

        foreach ($this->electricity as $i => $data) {
            $this->electricity[$i] = $electricity[$i];
        }
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
        $this->updateSpesification($this->productId);
        session()->flash('success', 'Spesifikasi berhasil disimpan.');
    }

    public function updateSpesification($id)
    {
        $product = Product::find($id);
        $product->engine = $this->engine;
        $product->frame_n_feet = $this->frame;
        $product->dimensions_and_weight = $this->dimension;
        $product->capacity = $this->capacity;
        $product->electricity = $this->electricity;
        $product->save();
    }

    public function render()
    {
        return view('livewire.product.edit.spesification');
    }
}