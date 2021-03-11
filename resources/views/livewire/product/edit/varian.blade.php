<div>
    <div class="row mb-3">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary rounded-lg" wire:click="$emitUp('previousStep', 1)">
                Kembali
            </button>
        </div>
    </div>

    <form wire:submit.prevent="saveVarian">

        <div class="row mb-1">

            <div class="col-12 col-md-4">
                <h5 class="card-title text-uppercase"><b>Tambah Varian Produk</b></h5>
                <p>
                    Pilih varian produk yang tersedia dan sesuai dengan produk yang akan ditambahkan.
                </p>
            </div>

            <div class="col-12 col-md-8">

                <div class="white-box shadow-sm rounded-lg repeater">
                    @if (session()->has('success-store'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hebat ! </strong>
                        {{ session()->get('success-store') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <fieldset class="form-group">
                        <label for="varian">Pilih Varian
                            <sub class="text-muted">(Harus diisi)</sub>
                        </label>
                        <br>

                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <p class="text">
                                    Pilih Gambar atau Letakkan Gambar Disini.<br>
                                    <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                </p>
                                <div class="preview-zone">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            @if ($tempVarians)
                                            <div class="row">
                                                @foreach($tempVarians as $i => $varian)
                                                <div class="col-12 mb-3 position-relative">
                                                    <button class="btn btn-danger btn-sm rounded-lg shadow-lg"
                                                        type="button"
                                                        wire:click="$emit('removeVarian', '{{$varian->getFileName()}}')"
                                                        style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <figure>
                                                        <img src="{{ $varian->temporaryUrl() }}" class="img-fluid">
                                                    </figure>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="varians" accept="image/*" class="dropzone" wire:model="tempVarians"
                                multiple style="position: absolute; z-index:3; top:0">
                        </div>

                        @error('tempVarians.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <div class="form-group text-right">
                        <button class="btn btn-dark rounded-lg" {{$tempVarians ? '' : 'disabled' }}>
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

    <div class="row">
        <div class="col-12 col-md-4">
            <h5 class="card-title text-uppercase"><b>Edit Varian Produk</b></h5>
            <p>
                Anda bisa menonatifkan varian ataupun menghapus varian dengan button disamping.
            </p>
        </div>

        <div class="col-12 col-md-8">


            <div class="white-box shadow-sm rounded-lg">

                @if (session()->has('success-edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hebat ! </strong>
                    {{ session()->get('success-edit') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="row">
                    @forelse ($datas as $data)
                    <div class="col-12 col-sm-6 col-md-6 mb-3">
                        <figure>
                            <img class="w-100"
                                src="{{route('get.product', [explode('/', $data->image_name)[2], explode('/', $data->image_name)[3]])}}"
                                alt="{{explode('/', $data->image_name)[3]}}">
                            <figcaption class="d-flex align-items-center justify-content-end mt-2">

                                <div class="custom-control custom-switch mr-4">
                                    <input type="checkbox" class="custom-control-input"
                                        id="is_active_{{$loop->iteration}}"
                                        wire:click="updateActiveState({{$data->id}}, {{$data->is_active == 1 ? 0 : 1}})"
                                        {{$data->is_active == 1 ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="is_active_{{$loop->iteration}}">
                                        {{$data->is_active == 1 ? 'Aktif' : 'Nonaktif'}}
                                    </label>
                                </div>

                                <button class="btn btn-danger btn-sm rounded-lg shadow-lg" type="button"
                                    wire:click="destroyVarian({{$data->id}})">
                                    <i class="fas fa-fw mr-1 fa-trash"></i> Varian
                                </button>
                            </figcaption>
                        </figure>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center m-0 py-2">Produk ini belum memiliki Varian.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
