<div class="row">
    @if (session()->has('success'))
    <div class="col-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hebat ! </strong> {!!session()->get('success')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <div class="col-12 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Tambahkan Banner</b></h5>
        <p>
            Tambahkan banner untuk halaman yang telah disediakan. Anda bisa mengatur durasi banner hingga menonaktifkan
            banner tanpa perlu menghapus banner.
        </p>
    </div>

    <div class="col-12 col-lg-8">

        <div class="white-box rounded-lg shadow-sm">
            <form wire:submit.prevent="saveBanner" enctype="multipart/form-data">

                <fieldset class="form-group">
                    <label for="title">Nama banner <sub class="text-muted">(Harus diisi)</sub></label>
                    <input type="text" name="title" class="form-control" wire:model="title">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group" x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <label for="image">Pilih banner <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <div class="dropzone-wrapper">
                        <div class="dropzone-desc">
                            <a class="btn btn-dark btn-sm rounded-circle shadow-sm text-center {{!empty($image) ? '' : 'd-none'}}"
                                style="height: 25px; width: 25px; line-height:1; position: absolute; top: .5rem; right:.5rem; z-index: 99;"
                                wire:click="resetImage">
                                x
                            </a>

                            <p class="text">
                                Pilih Gambar atau Letakkan Gambar Disini.<br>
                                <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                            </p>
                            <div class="preview-zone">
                                <div class="box box-solid">
                                    <div class="box-body">
                                        @if (!empty($image))
                                        <img class="img-thumbnail temp_img" src="{{$image->temporaryUrl()}}" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="file" name="image" wire:model="image" accept="image/*" class="dropzone"
                            style="position: absolute; z-index:3; top:0">

                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>

                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group row">

                    <div class="col-12 col-md-6 mb-3">
                        <label for="page_target">Target Halaman <sub class="text-muted">(Harus diisi)</sub></label>
                        <select name="page_target" class="form-control" wire:model="page_target">
                            <option value="" selected>Pilih halaman</option>
                            <option value="homepage">Homepage</option>
                            <option value="produk-bigbike">Produk/Big Bike</option>
                            <option value="ahass">Ahass</option>
                            <option value="honda-genuine-part">Honda Genuine Part</option>
                            <option value="honda-apparel">Honda Apparel</option>
                            <option value="honda-genuine-accessories">Honda Genuine Accessories</option>
                        </select>
                        @error('page_target')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="alt">Alt</label>
                        <input type="text" name="alt" class="form-control" wire:model="alt">
                        <sub class="text-muted">*Nama yang akan ditamplikan ketika gambar gagal di load</sub>
                        @error('alt')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </fieldset>

                <fieldset class="form-group">
                    <label for="description">Deskripsi banner</label>
                    <textarea name="description" style="resize: none; height:80px;" class="form-control"
                        wire:model="description"></textarea>
                    @error('description')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group row">

                    <div class="col-12 col-md-6 mb-3">
                        <label for="duration">Durasi banner</label>
                        <input type="date" name="duration" class="form-control" wire:model="duration">
                        @error('duration')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="show_banner">Tampilkan banner</label>
                        <select name="show_banner" class="form-control" wire:model="show_banner">
                            <option value="" selected>Pilih status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        @error('show_banner')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                </fieldset>

                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-dark rounded-lg font-light"
                            data-action="save">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
