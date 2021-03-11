<div>
    <form wire:submit.prevent="saveVarian">
        <div class="row mb-1">

            <div class="col-12 col-md-4">
                <h4 class="text-capitalize"><b>Step 3.</b></h4>
                <h5 class="card-title text-uppercase text-muted"><b>Varian Produk</b></h5>
                <p>
                    Pilih varian produk yang tersedia dan sesuai dengan produk yang akan ditambahkan.
                </p>
            </div>

            <div class="col-12 col-md-8">

                <div class="white-box shadow-sm rounded-lg repeater">

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
                                            @if ($varians)
                                            <div class="row">
                                                @foreach($varians as $i => $varian)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3 position-relative">
                                                    <button class="btn btn-danger btn-sm rounded-lg shadow-lg"
                                                        type="button"
                                                        wire:click="$emit('removeVarian', '{{$varian->getFileName()}}')"
                                                        style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <figure>
                                                        <img src="{{ $varian->temporaryUrl() }}" class="img-fluid">
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
                            <input type="file" name="varians" accept="image/*" class="dropzone" wire:model="varians"
                                multiple style="position: absolute; z-index:3; top:0">
                        </div>

                        @error('varians.*')
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