<div>
    <div class="row mb-3">
        <div class="col-12 text-right">
            <button type="button" class="btn btn-primary rounded-lg" wire:click="$emitUp('previousStep', 1)">
                Kembali
            </button>
        </div>
    </div>

    <div class="row mb-1">

        <div class="col-12 col-md-4">
            <h5 class="card-title text-uppercase"><b>Tambahkan Fitur Produk</b></h5>
            <p>
                Tambahkan fitur produk yang menggambarkan keunggulan produk tersebut.
            </p>
        </div>

        <div class="col-12 col-md-8">
            <div class="white-box shadow-sm rounded-lg">

                @if (session()->has('success-store'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hebat ! </strong>
                    {{ session()->get('success-store') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <form wire:submit.prevent="saveFeature">
                    <div class="py-2">

                        <fieldset class="form-group">

                            <label for="feature">Pilih Gambar
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
                                                @if ($image)
                                                <button class="btn btn-danger btn-sm rounded-lg shadow-lg" type="button"
                                                    wire:click="$emit('removeImage', '{{ $image ?$image->getFileName() : ''}}')"
                                                    style="position: absolute; right: .5rem; top: .5rem; z-index: 999">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                @endif
                                                <figure>
                                                    <img src="{{ $image ? $image->temporaryUrl() : '' }}"
                                                        class="img-fluid">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="" accept="image/*" class="dropzone" wire:model="image"
                                    style="position: absolute; z-index:3; top:0">

                            </div>
                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>

                        <fieldset class="form-group">
                            <label for="name">
                                Nama <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="description">
                                Deskripsi <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <textarea class="form-control" name="descriptions" style="resize: none; height:100px"
                                wire:model="description"></textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-dark rounded-lg">
                            Simpan
                            <div class="spinner-border text-light spinner-border-sm ml-1" wire:loading="saveFeature"
                                role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row mb-1">

        <div class="col-12 col-md-4">
            <h5 class="card-title text-uppercase"><b>Hapus Fitur Produk</b></h5>
            <p>
                Hapus fitur produk yang tidak sesuai dengan kriteria.
            </p>
        </div>

        <div class="col-12 col-md-8">
            <div class="white-box shadow-sm rounded-lg">

                @if (session()->has('success-delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hebat ! </strong>
                    {{ session()->get('success-delete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="row">
                    @foreach ($features as $i => $feature)

                    <div class="col-12 col-md-6 mb-3">
                        <div class="p-2 p-md-3 border rounded-lg">
                            <figure>
                                <img src="{{route('get.product', [explode('/', $feature->image_name)[2], explode('/', $feature->image_name)[3]])}}"
                                    class="w-100">
                            </figure>

                            <h4 class="font-bold">{{$feature->title}}</h4>
                            <p>{{$feature->description}}</p>

                            <div class="form-group text-right mb-0">
                                <button class="btn btn-danger shadow-none" wire:click="deleteFeature({{$feature->id}})">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
