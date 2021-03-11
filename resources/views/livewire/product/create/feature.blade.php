<div>
    <div class="row mb-1">

        <div class="col-12 col-md-4">
            <h4 class="text-capitalize"><b>Step 4.</b></h4>
            <h5 class="card-title text-uppercase text-muted"><b>Fitur Produk</b></h5>
            <p>
                Tambahkan fitur produk yang menggambarkan keunggulan produk tersebut.
            </p>
        </div>

        <div class="col-12 col-md-8">
            <div class="white-box shadow-sm rounded-lg">

                <fieldset class="form-group row">
                    <div class="col-12 col-md-3 mb-3 mb-md-0">
                        <label for="totalFeature" class="col-form-label">Jumlah Fitur</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="input-group">
                            <input type="text" class="form-control numeric" wire:model.defer="totalFeature">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" wire:click="$emit('updateTotal')">Buat</button>
                            </div>
                        </div>
                        <small class="text-muted">
                            Form akan di generate ketika jumlah fitur telah ditentukan.
                        </small>
                    </div>
                </fieldset>

                <form wire:submit.prevent=saveFeature>
                    @if ($totalFeature !== null && $totalFeature !== 0 && $totalFeature !== '')

                    @for ($i = 0;$totalFeature > $i; $i++)

                    <div class="py-2">
                        <h5 class="font-bold text-uppercase ">Fitur {{$i + 1 }}</h5>

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
                                                <button class="btn btn-danger btn-sm rounded-lg shadow-lg" type="button"
                                                    wire:click="$emit('removeImage', '{{ $features[$i]['image'] ? $features[$i]['image']->getFileName() : ''}}', '{{$i}}')"
                                                    style="position: absolute; right: .5rem; top: .5rem; z-index: 999">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <figure>
                                                    <img src="{{ $features[$i]['image'] ? $features[$i]['image']->temporaryUrl() : '' }}"
                                                        class="img-fluid">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="" accept="image/*" class="dropzone"
                                    wire:model="features.{{$i}}.image" style="position: absolute; z-index:3; top:0">

                            </div>
                            @error('features.'.$i.'.image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>

                        <fieldset class="form-group">
                            <label for="name">
                                Nama <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <input type="text" class="form-control" wire:model="features.{{$i}}.name">
                            @error('features.'.$i.'.name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="description">
                                Deskripsi <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <textarea class="form-control" name="descriptions" style="resize: none; height:100px"
                                wire:model="features.{{$i}}.description"></textarea>
                            @error('features.'.$i.'.description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>
                    </div>

                    @endfor

                    <div class="form-group text-right">
                        <button class="btn btn-dark rounded-lg">
                            Selanjutnya
                            <div class="spinner-border text-light spinner-border-sm ml-1" wire:loading="storeProduct"
                                role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </div>
                    @endif

                </form>

            </div>
        </div>
    </div>
</div>
