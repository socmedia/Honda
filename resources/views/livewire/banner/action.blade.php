<div class="row">
    <div class="col-12 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Tambahkan Banner</b></h5>
        <p>
            Tambahkan banner untuk halaman yang telah disediakan. Anda bisa mengatur durasi banner hingga menonaktifkan
            banner tanpa perlu menghapus banner.
        </p>
    </div>

    <div class="col-12 col-lg-8">

        <div class="white-box rounded-lg shadow-sm">
            <form wire:submit.prevent="store">

                <fieldset class="form-group">
                    <label for="title">Nama banner <sub class="text-muted">(Harus diisi)</sub></label>
                    <input type="text" name="title" class="form-control" wire:model="title">
                    @error('title')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group">
                    <label for="image">Pilih banner <sub class="text-muted">(Harus diisi)</sub></label>
                    <input type="file" name="image" data-action="filepond" wire:model="image">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group row">

                    <div class="col-12 col-md-6 mb-3">
                        <label for="page_target">Target Halaman</label>
                        <select name="page_target" class="form-control" wire:model="page_target">
                            <option value="" disabled selected>Pilih halaman</option>
                            <option value="homepage">Homepage</option>
                            <option value="produk-cub">Produk/Cub</option>
                            <option value="produk-matic">Produk/Matic</option>
                            <option value="produk-sport">Produk/Sport</option>
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
                        <input type="datetime-local" name="duration" class="form-control" wire:model="duration">
                        @error('duration')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="show_banner">Tampilkan banner</label>
                        <select name="show_banner" class="form-control" wire:model="show_banner">
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
                        <button type="submit" class="btn btn-dark rounded-lg font-light">Simpan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
