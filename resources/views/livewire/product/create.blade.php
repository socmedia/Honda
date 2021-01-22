{{-- Informasi Umum --}}
<form action="{{route('adm.product.store')}}" method="POST">
    @csrf
    <div class="row mb-1">

        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Informasi Umum</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="info">
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Informasi umum seputar produk yang akan dimasukkan.
            </p>
        </div>

        <div class="col-12 col-md-6 col-lg-8" data-target="info">

            <div class="white-box shadow-sm rounded-lg">
                <fieldset class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <label for="name">Nama Produk <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <input type="text" class="form-control" name="name" wire:model="name">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="category">kategori Produk <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <select name="category" class="form-control" wire:model="category">
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="matic">Matic</option>
                            <option value="Sport">Sport</option>
                            <option value="cub">Cub</option>
                            <option value="big-bike">BigBike</option>
                        </select>
                        @error('category')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <label for="price">Harga produk<sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <input type="text" class="form-control" name="price" wire:model="price">
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="promo_price">Harga promo</label>
                        <input type="text" class="form-control" name="promo_price" wire:model="promo_price">
                        @error('promo_price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="new_product"
                            wire:model="is_new">
                        <label class="form-check-label" for="exampleCheck1">Apakah produk ini baru
                            ?</label>
                    </div>
                </fieldset>

                <fieldset class="form-group text-right">
                    <button class="btn btn-dark rounded-lg">Simpan</button>
                </fieldset>

            </div>
        </div>

    </div>
</form>

{{-- Banner --}}
<div class="row mb-1">
    <div class="col-12 d-flex justify-content-between mb-1">
        <h5 class="card-title text-uppercase"><b>Banner Produk</b></h5>
        <button class="btn btn-sm btn-light rounded" type="button" data-toggle="banner"
            {{($product === null) ? 'disabled' : ''}}>
            <i class="fas fa-expand mr-1"></i>
            Maximize
        </button>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <p>
            Banner seputar produk yang bisa menarik perhatian calon pembeli.
        </p>
    </div>
    <div class="col-12 col-md-6 col-lg-8 d-none" data-target="banner">

        <div class="white-box shadow-sm rounded-lg">

            <fieldset class="form-group" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <label for="banner">Pilih banner <sub class="text-muted">(Harus diisi)</sub></label> <br>

                <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                        <a class="btn btn-dark btn-sm rounded-circle shadow-sm text-center {{!empty($banner) ? '' : 'd-none'}}"
                            style="height: 25px; width: 25px; line-height:1; position: absolute; top: .5rem; right:.5rem; z-index: 99;"
                            wire:click="$emitUp('resetBanner')">
                            x
                        </a>

                        <p class="text">
                            Pilih Gambar atau Letakkan Gambar Disini.<br>
                            <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                        </p>
                        <div class="preview-zone">
                            <div class="box box-solid">
                                <div class="box-body">
                                    @if (!empty($banner))
                                    <img class="img-thumbnail temp_img" src="{{$banner->temporaryUrl()}}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="banner[]" wire:model="banner" accept="image/*" class="dropzone"
                        style="position: absolute; z-index:3; top:0">

                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

                <div class="dropzone_box_clone"></div>

                @error('image')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </fieldset>

        </div>
    </div>
</div>

{{-- Varian --}}
<div class="row mb-1">

    <div class="col-12 d-flex justify-content-between mb-1">
        <h5 class="card-title text-uppercase"><b>Varian Produk</b></h5>
        <button class="btn btn-sm btn-light rounded" type="button" data-toggle="varian">
            <i class="fas fa-expand mr-1"></i>
            Maximize
        </button>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <p>
            Pilih varian produk yang tersedia dan sesuai dengan produk yang akan ditamnbahkan
        </p>
    </div>

    <div class="col-12 col-md-6 col-lg-8 d-none" data-target="varian">

        <div class="white-box shadow-sm rounded-lg">

            <fieldset class="form-group" x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <label for="varian">Pilih varian <sub class="text-muted">(Harus diisi)</sub></label> <br>

                <div class="dropzone-wrapper">
                    <div class="dropzone-desc">
                        <a class="btn btn-dark btn-sm rounded-circle shadow-sm text-center {{!empty($varian) ? '' : 'd-none'}}"
                            style="height: 25px; width: 25px; line-height:1; position: absolute; top: .5rem; right:.5rem; z-index: 99;"
                            wire:click="$emitUp('resetVarian')">
                            x
                        </a>

                        <p class="text">
                            Pilih Gambar atau Letakkan Gambar Disini.<br>
                            <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                        </p>
                        <div class="preview-zone">
                            <div class="box box-solid">
                                <div class="box-body">
                                    @if (!empty($varian))
                                    <img class="img-thumbnail temp_img" src="{{$varian->temporaryUrl()}}" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="file" name="varian[]" wire:model="varian" accept="image/*" class="dropzone"
                        style="position: absolute; z-index:3; top:0">

                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>

                <div class="dropzone_box_clone"></div>

                @error('image')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </fieldset>

        </div>
    </div>

</div>

{{-- Feature --}}
<form wire:submit.prevent="saveFeature" enctype="multipart/form-data">
    <div class="row mb-1">

        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Fitur Produk</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="feature">
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Tambahkan fitur produk yang menggambarkan keunggulan produk tersebut.
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg d-none" data-target="feature">
            <div class="white-box shadow-sm rounded-lg" data-clone-box="feature">

                <fieldset class="form-group row bg-ligh" x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress" data-clone-target="feature">

                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <label for="feature">Pilih Gambar <sub class="text-muted">(Harus diisi)</sub></label> <br>
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <a class="btn btn-dark btn-sm rounded-circle shadow-sm text-center {{!empty($feature) ? '' : 'd-none'}}"
                                    style="height: 25px; width: 25px; line-height:1; position: absolute; top: .5rem; right:.5rem; z-index: 99;"
                                    wire:click="$emitUp('resetFeature')">
                                    x
                                </a>

                                <p class="text">
                                    Pilih Gambar atau Letakkan Gambar Disini.<br>
                                    <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                </p>
                                <div class="preview-zone">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            @if (!empty($feature))
                                            <img class="img-thumbnail temp_img" src="{{$feature->temporaryUrl()}}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="feature_images[]" wire:model="feature_images" accept="image/*"
                                class="dropzone" multiple style="position: absolute; z-index:3; top:0">

                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>
                        @error('feature_images')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">

                        <fieldset class="form-group">
                            <label for="feature_name">
                                Nama Fitur <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <input type="text" class="form-control" name="feature_name" wire:model="feature_name">
                            @error('feature_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="feature_description">
                                Deskripsi Fitur <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <textarea class="form-control" name="feature_description" style="resize: none; height:100px"
                                wire:model="feature_description"></textarea>
                            @error('feature_description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                    </div>

                    <button class="btn-sm btn-primary btn" type="button" data-action="clone">
                        + Baris
                    </button>

                </fieldset>

            </div>
        </div>
    </div>
</form>

{{-- Spesification --}}
<div class="row mb-1">

    <div class="col-12 d-flex justify-content-between mb-1">
        <h5 class="card-title text-uppercase"><b>Spesifikasi Produk</b></h5>
        <button class="btn btn-sm btn-light rounded" type="button" data-toggle="spesification">
            <i class="fas fa-expand mr-1"></i>
            Maximize
        </button>
    </div>

    <div class="col-12 col-md-6 col-lg-4">
        <p>
            Atur spesifikasi produk dengan format yang sudah ditentukan.
        </p>
    </div>
    <div class="col-12 col-md-6 col-lg-8 d-none" data-target="spesification">

        <div class="white-box shadow-sm rounded-lg">

            <fieldset class="form-group">
                <label for="feature">Pilih gambar <sub class="text-muted">(Harus diisi)</sub></label> <br>

                <textarea id="editor" name="engine" wire:ignore wire:model="engine">
                        {{$engine}}
                    </textarea>

                @error('image')
                <small class="text-danger">{{$message}}</small>
                @enderror

            </fieldset>

            <fieldset class="form-group text-right">
                <button class="btn btn-dark rounded-lg">Simpan</button>
            </fieldset>

        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        setTimeout(() => {
            ClassicEditor.create(document.querySelector('#editor'))
        }, 5000);

        function changeTargetState(target){
            const minimize = '<i class="fas fa-compress mr-1"></i>Minimize',
            maximize = '<i class="fas fa-expand mr-1"></i>Maximize';
            $(`[data-target="${target}"]`).hasClass('d-none') === true ? $(this).html(minimize) : $(this).html(maximize);
            $(`[data-target="${target}"]`).toggleClass('d-none');
        }

        $('[data-toggle="info"]').click(() => changeTargetState('info'));
        $('[data-toggle="banner"]').click(() => changeTargetState('banner'));
        $('[data-toggle="varian"]').click(() => changeTargetState('varian'));
        $('[data-toggle="feature"]').click(() => changeTargetState('feature'));
        $('[data-toggle="spesification"]').click(() => changeTargetState('spesification'));

        function cloneBox(){
            $('[data-clone-target="feature"]').clone().appendTo('[data-clone-box="feature"]')
        }

        $('[data-action="clone"]').click(() => cloneBox())
    })
</script>
@endpush
