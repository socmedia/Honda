<div>
    <div class="mb-4 text-right">
        <div class="btn-group shadow-sm">
            <span class="px-3 py-2 text-center {{$step === 1 ? 'bg-dark text-white' : 'bg-light'}}">
                Step 1
            </span>
            <span class="px-3 py-2 text-center {{$step === 2 ? 'bg-dark text-white' : 'bg-light'}}">
                Step 2
            </span>
            <span class="px-3 py-2 text-center {{$step === 3 ? 'bg-dark text-white' : 'bg-light'}}">
                Step 3
            </span>
            <span class="px-3 py-2 text-center {{$step === 4 ? 'bg-dark text-white' : 'bg-light'}}">
                Step 4
            </span>
            <span class="px-3 py-2 text-center {{$step === 5 ? 'bg-dark text-white' : 'bg-light'}}">
                Step 5
            </span>
        </div>
    </div>

    @if ($step === 1 || $step === null)
    @livewire('product.create.information')
    @endif

    @if ($step === 2)
    @livewire('product.create.banner', ['productId' => $productId])
    @endif

    @if ($step === 3)
    @livewire('product.create.varian', ['productId' => $productId])
    @endif

    @if ($step === 4)
    @livewire('product.create.feature', ['productId' => $productId])
    @endif

    @if ($step === 5)
    @livewire('product.create.spesification', ['productId' => $productId])
    @endif
</div>