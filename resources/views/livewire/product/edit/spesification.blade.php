<div>

    <div class="row mb-3">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary rounded-lg" wire:click="$emitUp('previousStep', 1)">
                Kembali
            </button>
        </div>
    </div>

    <form wire:submit.prevent="saveSpesification">
        @csrf
        <div class="row mb-1">

            <div class="col-12 col-md-4">
                <h5 class="card-title text-uppercase"><b>Spesifikasi Produk</b></h5>
                <p>
                    Atur spesifikasi produk dengan format yang sudah ditentukan.
                </p>
            </div>
            <div class="col-12 col-md-8 ">

                <div class="white-box shadow-sm rounded-lg">

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hebat ! </strong>
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <fieldset class="form-group">
                        <h4 class="font-bold text-muted">Mesin</h4>
                        <hr>
                        <table class="w-100">
                            @foreach ($t_engine as $i => $item)
                            <tr>
                                <td class="px-2 py-1" width="40%">
                                    <label class="col-form-label">{{$item['name']}}</label>
                                </td>
                                <td class="px-2 py-1">
                                    <input type="text" class="form-control" wire:model="engine.{{$item['slug_name']}}">
                                    @error('engine.'. $item['slug_name'])
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </fieldset>

                    <fieldset class="form-group">
                        <h4 class="font-bold text-muted">Rangka & Kaki-Kaki</h4>
                        <hr>
                        <table class="w-100">
                            @foreach ($t_frame as $item)
                            <tr>
                                <td class="px-2 py-1" width="40%">
                                    <label class="col-form-label">{{$item['name']}}</label>
                                </td>
                                <td class="px-2 py-1">
                                    <input type="text" class="form-control" wire:model="frame.{{$item['slug_name']}}"
                                        value="">
                                    @error('frame.'. $item['slug_name'])
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </fieldset>

                    <fieldset class="form-group">
                        <h4 class="font-bold text-muted">Dimensi & Berat</h4>
                        <hr>
                        <table class="w-100">
                            @foreach ($t_dimension as $item)
                            <tr>
                                <td class="px-2 py-1" width="40%">
                                    <label class="col-form-label">{{$item['name']}}</label>
                                </td>
                                <td class="px-2 py-1">
                                    <input type="text" class="form-control"
                                        wire:model="dimension.{{$item['slug_name']}}">
                                    @error('dimension.'. $item['slug_name'])
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </fieldset>

                    <fieldset class="form-group">
                        <h4 class="font-bold text-muted">Kapasitas</h4>
                        <hr>
                        <table class="w-100">
                            @foreach ($t_capacity as $item)
                            <tr>
                                <td class="px-2 py-1" width="40%">
                                    <label class="col-form-label">{{$item['name']}}</label>
                                </td>
                                <td class="px-2 py-1">
                                    <input type="text" class="form-control"
                                        wire:model="capacity.{{$item['slug_name']}}">
                                    @error('capacity.'. $item['slug_name'])
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </fieldset>

                    <fieldset class="form-group">
                        <h4 class="font-bold text-muted">Kelistrikan</h4>
                        <hr>
                        <table class="w-100">
                            @foreach ($t_electricity as $item)
                            <tr>
                                <td class="px-2 py-1" width="40%">
                                    <label class="col-form-label">{{$item['name']}}</label>
                                </td>
                                <td class="px-2 py-1">
                                    <input type="text" class="form-control"
                                        wire:model="electricity.{{$item['slug_name']}}">
                                    @error('electricity.'. $item['slug_name'])
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </fieldset>

                    <div class="form-group text-right">
                        <button class="btn btn-dark rounded-lg">
                            Simpan
                            <div class="spinner-border text-light spinner-border-sm ml-1" wire:loading="storeProduct"
                                role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
