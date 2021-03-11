<div>

    <form wire:submit.prevent="saveBanner">
        <div class="row mb-1">

            <div class="col-12 col-md-4">
                <h4 class="text-capitalize"><b>Step 2.</b></h4>
                <h5 class="card-title text-uppercase text-muted"><b>Banner Produk</b></h5>
                <p>
                    Banner seputar produk yang bisa menarik perhatian calon pembeli.
                </p>
            </div>

            <div class="col-12 col-md-8">

                <div class="white-box shadow-sm rounded-lg">

                    <fieldset class="form-group">
                        <label for="banner">Pilih Banner
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
                                            @if ($banners)
                                            <div class="row">
                                                @foreach($banners as $i => $banner)
                                                <div class="col-12 mb-3 position-relative">
                                                    <button class="btn btn-danger btn-sm rounded-lg shadow-lg"
                                                        type="button"
                                                        wire:click="$emit('removeBanner', '{{$banner->getFileName()}}')"
                                                        style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <figure>
                                                        <img src="{{ $banner->temporaryUrl() }}" class="w-100">
                                                        <figcaption>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="banners" accept="image/*" class="dropzone" wire:model="banners"
                                multiple style="position: absolute; z-index:3; top:0">
                        </div>

                        @error('banners.*')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <div class="form-group text-right">
                        <button class="btn btn-dark rounded-lg">
                            Selanjutnya
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