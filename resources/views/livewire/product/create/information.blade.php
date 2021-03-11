<div>
    <form wire:submit.prevent="storeInformation">
        @csrf

        <div class="row mb-1">

            <div class="col-12 col-md-4">
                <h4 class="text-capitalize"><b>Step 1.</b></h4>
                <h5 class="card-title text-uppercase text-muted"><b>Informasi Umum</b></h5>
                <p>
                    Informasi umum seputar produk yang akan dimasukkan.
                </p>
            </div>

            <div class="col-12 col-md-8">
                <div class="white-box shadow-sm rounded-lg">

                    <fieldset class="form-group">
                        <label for="thumbnail">Pilih thumbnail <sub class="text-muted">(Harus diisi)</sub></label> <br>

                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <p class="text">
                                    Pilih Gambar atau Letakkan Gambar Disini.<br>
                                    <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                </p>
                                <div class="preview-zone">
                                    <div class="box box-solid">
                                        <div class="box-body">
                                            <img src="{{ $thumbnail ? $thumbnail->temporaryUrl() : '' }}"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="thumbnail" accept="image/*" class="dropzone" wire:model="thumbnail"
                                style="position: absolute; z-index:3; top:0">
                        </div>

                        @error('thumbnail')
                        <small class="text-danger">{{$message}}</small>
                        @enderror

                    </fieldset>

                    <fieldset class="form-group">
                        <label for="name">Nama Produk
                            <sub class="text-muted">(Harus diisi)</sub>
                        </label>
                        <input type="text" class="form-control" name="name" wire:model="name">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group row">
                        <div class="col-12 col-md-6 mb-3 mb-lg-0">
                            <label for="category">Kategori Produk
                                <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <select name="category" class="form-control select_searchable" wire:model="category">
                                <option value="" disabled selected>Pilih kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{$category['slug_name']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="brochure">Brosur Produk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="application/pdf" id="brochure"
                                    wire:model="brochure">
                                <label class="custom-file-label"
                                    for="brochure">{{ $brochure ? $brochure->getClientOriginalName() : 'Pilih Brosur' }}</label>
                            </div>
                            @error('brochure')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="form-group row">
                        <div class="col-12 col-md-6 mb-3 mb-lg-0">
                            <label for="price">Harga Produk
                                <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <input type="text" class="form-control" name="price" wire:model="price">
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="promoPrice">Harga promo</label>
                            <input type="text" class="form-control" name="promoPrice" wire:model="promoPrice">
                            @error('promoPrice')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="isNew" name="isNew"
                                wire:model="isNew">
                            <label class="custom-control-label" for="isNew">Apakah produk ini baru ?</label>
                        </div>
                    </fieldset>

                    <fieldset class="form-group text-right">
                        <button class="btn btn-dark rounded-lg">
                            Selanjutnya
                            <div class="spinner-border text-light spinner-border-sm ml-1" wire:loading="storeProduct"
                                role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </button>
                    </fieldset>

                </div>
            </div>

        </div>

    </form>

</div>
