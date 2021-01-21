<div class="row py-3">
    <div class="col-12 col-md-6 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Banner Produk</b></h5>
        <p>
            Banner seputar produk yang bisa menarik perhatian calon pembeli.
        </p>
    </div>
    <div class="col-12 col-md-6 col-lg-8">

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