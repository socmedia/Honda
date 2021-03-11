<div>

    @if ($step === 1 || $step === null)
    <div class="row mb-3">
        <div class="col-12 text-right align-self-start">
            <a wire:click="$set('step', 2)" class="btn btn-primary mb-1 mb-md-0" title="Edit Banner">
                <i class="fas fa-pencil-alt mr-2"></i> Banner
            </a>
            <a wire:click="$set('step', 3)" class="btn btn-primary mb-1 mb-md-0" title="Edit Varian">
                <i class="fas fa-pencil-alt mr-2"></i> Varian
            </a>
            <a wire:click="$set('step', 4)" class="btn btn-primary mb-1 mb-md-0" title="Edit Fitur">
                <i class="fas fa-pencil-alt mr-2"></i> Fitur
            </a>
            <a wire:click="$set('step', 5)" class="btn btn-primary" title="Edit Spesifikasi">
                <i class="fas fa-pencil-alt mr-2"></i> Spesifikasi
            </a>
        </div>
    </div>

    @livewire('product.edit.information', ['product' => $product])
    @endif

    @if ($step === 2)
    @livewire('product.edit.banner', ['productId' => $product->id])
    @endif

    @if ($step === 3)
    @livewire('product.edit.varian', ['productId' => $product->id])
    @endif

    @if ($step === 4)
    @livewire('product.edit.feature', ['productId' => $product->id])
    @endif

    @if ($step === 5)
    @livewire('product.edit.spesification', ['productId' => $product->id])
    @endif
</div>