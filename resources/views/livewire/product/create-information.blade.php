<div class="row py-3">
    <div class="col-12 col-md-6 col-lg-4">
        <h5 class="card-title text-uppercase"><b>Informasi Umum</b></h5>
        <p>
            Informasi umum seputar produk yang akan dimasukkan.
        </p>
    </div>
    <div class="col-12 col-md-6 col-lg-8">

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
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Apakah produk ini baru
                        ?</label>
                </div>
            </fieldset>

        </div>
    </div>
</div>
