{{-- Informasi Umum --}}
<form action="{{route('adm.product.store')}}" method="POST" enctype="multipart/form-data">
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

        <div class="col-12 col-md-6 col-lg-8 {{($product ==='') ? '' : 'd-none'}}" data-target="info">

            <div class="white-box shadow-sm rounded-lg">

                @dump(old('thumbnail'))

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
                                        <img src="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="file" name="thumbnail" accept="image/*" class="dropzone" onchange="readURL(this)"
                            style="position: absolute; z-index:3; top:0">
                    </div>

                    @error('thumbnail')
                    <small class="text-danger">{{$message}}</small>
                    @enderror

                </fieldset>

                <fieldset class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <label for="name">Nama Produk <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="category">kategori Produk <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <select name="category" class="form-control" value="{{old('category')}}">
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="matic" {{old('category') === 'matic'? 'selected' : '' }}>Matic</option>
                            <option value="sport" {{old('category') === 'sport'? 'selected' : '' }}>Sport</option>
                            <option value="cub" {{old('category') === 'cub'? 'selected' : '' }}>Cub</option>
                            <option value="big-bike" {{old('category') === 'big-bike'? 'selected' : '' }}>BigBike
                            </option>
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
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="promo_price">Harga promo</label>
                        <input type="text" class="form-control" name="promo_price" value="{{old('promo_price')}}">
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

@if ($product !== '')
<form action="{{route('adm.product.update', request()->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    {{-- Banner --}}
    <div class="row mb-1">
        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Banner Produk</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="banner"
                {{($product ==='') ? 'disabled' : ''}}>
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Banner seputar produk yang bisa menarik perhatian calon pembeli.
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg-8 {{($product ==='') ? 'd-none' : ''}}" data-target="banner">

            <div class="white-box shadow-sm rounded-lg repeater">

                <div data-repeater-list="banners">
                    <div data-repeater-item>
                        <fieldset class="form-group">
                            <label for="banner">Pilih banner <sub class="text-muted">(Harus diisi)</sub></label> <br>

                            <div class="dropzone-wrapper">
                                <button data-repeater-delete class="btn btn-danger btn-sm rounded-lg shadow-lg"
                                    type="button" style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="dropzone-desc">
                                    <p class="text">
                                        Pilih Gambar atau Letakkan Gambar Disini.<br>
                                        <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                    </p>
                                    <div class="preview-zone">
                                        <div class="box box-solid">
                                            <div class="box-body">
                                                <img src="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="" accept="image/*" class="dropzone" onchange="readURL(this)"
                                    style="position: absolute; z-index:3; top:0">
                            </div>

                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <input data-repeater-create class="btn btn-primary rounded-lg shadow-lg" type="button"
                            value="+ Banner" />
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Varian --}}
    <div class="row mb-1">

        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Varian Produk</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="varian"
                {{($product ==='') ? 'disabled' : ''}}>
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Pilih varian produk yang tersedia dan sesuai dengan produk yang akan ditamnbahkan
            </p>
        </div>

        <div class="col-12 col-md-6 col-lg-8 {{($product ==='') ? 'd-none' : ''}}" data-target="varian">

            <div class="white-box shadow-sm rounded-lg repeater">

                <div data-repeater-list="varians">
                    <div data-repeater-item>
                        <fieldset class="form-group">
                            <label for="varians">Pilih varian <sub class="text-muted">(Harus diisi)</sub></label> <br>

                            <div class="dropzone-wrapper">
                                <button data-repeater-delete class="btn btn-danger btn-sm rounded-lg shadow-lg"
                                    type="button" style="position:  absolute; right: .5rem; top: .5rem; z-index: 999">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="dropzone-desc">
                                    <p class="text">
                                        Pilih Gambar atau Letakkan Gambar Disini.<br>
                                        <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                    </p>
                                    <div class="preview-zone">
                                        <div class="box box-solid">
                                            <div class="box-body">
                                                <img src="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="" accept="image/*" class="dropzone" onchange="readURL(this)"
                                    style="position: absolute; z-index:3; top:0">
                            </div>

                            <div class="dropzone_box_clone"></div>

                            @error('image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <input data-repeater-create class="btn btn-primary rounded-lg shadow-lg" type="button"
                            value="+ Varian" />
                    </div>
                </div>

            </div>
        </div>

    </div>

    {{-- Feature --}}
    <div class="row mb-1">

        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Fitur Produk</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="feature"
                {{($product ==='') ? 'disabled' : ''}}>
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Tambahkan fitur produk yang menggambarkan keunggulan produk tersebut.
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg-8 {{($product ==='') ? 'd-none' : ''}}" data-target="feature">
            <div class="white-box shadow-sm rounded-lg repeater">

                <div data-repeater-list="features">
                    <div data-repeater-item>

                        <fieldset class="form-group row">

                            <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                <label for="feature">Pilih Gambar Fitur <sub class="text-muted">(Harus
                                        diisi)</sub></label>
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
                                                    <img src="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="" accept="image/*" class="dropzone"
                                        onchange="readURL(this)" style="position: absolute; z-index:3; top:0">

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
                                    <input type="text" class="form-control" name="feature_name">
                                    @error('feature_name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="feature_description">
                                        Deskripsi Fitur <sub class="text-muted">(Harus diisi)</sub>
                                    </label>
                                    <textarea class="form-control" name="feature_description"
                                        style="resize: none; height:100px"></textarea>
                                    @error('feature_description')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </fieldset>

                            </div>

                        </fieldset>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 col-md-6 mb-3 mb-lg-0">
                        <input data-repeater-create class="btn btn-primary rounded-lg shadow-lg" type="button"
                            value="+ Fitur" />
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Spesification --}}
    <div class="row mb-1">

        <div class="col-12 d-flex justify-content-between mb-1">
            <h5 class="card-title text-uppercase"><b>Spesifikasi Produk</b></h5>
            <button class="btn btn-sm btn-light rounded" type="button" data-toggle="spesification"
                {{($product ==='') ? 'disabled' : ''}}>
                <i class="fas fa-expand mr-1"></i>
                Maximize
            </button>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <p>
                Atur spesifikasi produk dengan format yang sudah ditentukan.
            </p>
        </div>
        <div class="col-12 col-md-6 col-lg-8 {{($product ==='') ? 'd-none' : ''}}" data-target="spesification">

            <div class="white-box shadow-sm rounded-lg">

                <fieldset class="form-group">
                    <label for="engine">Mesin <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <textarea id="editor" name="engine">
                        @if ($product !=='')
                        {!!$product->engine!!}
                        @else
                        <x-product.engine/>
                        @endif
                    </textarea>
                    @error('engine')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group">
                    <label for="frame">Rangka & Kaki Kaki <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <textarea id="editor" name="frame">
                        @if ($product !=='')
                        {!!$product->frame_n_feet!!}
                        @else
                        <x-product.frame/>
                        @endif
                    </textarea>
                    @error('frame')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group">
                    <label for="dimension">Dimensi & Berat <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <textarea id="editor" name="dimension">
                        @if ($product !=='')
                        {!!$product->dimensions_and_weight!!}
                        @else
                        <x-product.dimension/>
                        @endif
                    </textarea>
                    @error('dimension')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group">
                    <label for="capacity">Kapasitas <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <textarea id="editor" name="capacity">
                        @if ($product !=='')
                        {!!$product->capacity!!}
                        @else
                        <x-product.capacity/>
                        @endif
                    </textarea>
                    @error('capacity')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group">
                    <label for="electricity">Kelistrikan <sub class="text-muted">(Harus diisi)</sub></label> <br>
                    <textarea id="editor" name="electricity">
                        @if ($product !=='')
                        {!! $product->electricity !!}
                        @else
                        <x-product.electricity/>
                        @endif
                    </textarea>
                    @error('electricity')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </fieldset>

                <fieldset class="form-group text-right">
                    <button class="btn btn-dark rounded-lg">Simpan</button>
                </fieldset>

            </div>
        </div>
    </div>

</form>
@endif


@push('scripts')
<script>
    $(document).ready(function() {

    const editor = document.querySelectorAll('#editor');
    editor.forEach(el => {
        ClassicEditor.create(el)
    })

    function changeTargetState(target) {
        const minimize = '<i class="fas fa-compress mr-1"></i>Minimize',
            maximize = '<i class="fas fa-expand mr-1"></i>Maximize';
        $(`[data-target="${target}"]`).hasClass('d-none') === true ? $(this).html(minimize) : $(this).html(
            maximize);
        $(`[data-target="${target}"]`).toggleClass('d-none');
    }

    $('[data-toggle="info"]').click(() => changeTargetState('info'));
    $('[data-toggle="banner"]').click(() => changeTargetState('banner'));
    $('[data-toggle="varian"]').click(() => changeTargetState('varian'));
    $('[data-toggle="feature"]').click(() => changeTargetState('feature'));
    $('[data-toggle="spesification"]').click(() => changeTargetState('spesification'));

    function cloneBox() {
        $('[data-clone-target="feature"]').clone().appendTo('[data-clone-box="feature"]')
    }

    $('[data-action="clone"]').click(() => cloneBox())

    $(".repeater").repeater({
        show: function() {
            $(this).slideDown()
        },
        hide: function(e) {
            confirm("Anda yakin akan menghapus elemen ini ?") && $(this).slideUp(e)
        }
    })

})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            console.log(input)
            $(input).parents('.dropzone-wrapper').find('img').attr('src', e.target.result)
            // $('input[type="file"]').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
</script>
@endpush
