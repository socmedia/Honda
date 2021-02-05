@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Genuine Parts</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.hgp.index')}}">Genuine Parts</a></li>
    <li class="breadcrumb-item active">Tambah</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="col-12">

        <form action="{{route('adm.hgp.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

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
                    <h5 class="card-title text-uppercase"><b>Tambahkan Genuine Parts</b></h5>
                    <p>
                        Anda bisa melakukan penambahan data Genuine Parts dengan mengisikan form disamping.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg">

                        <fieldset class="form-group">
                            <label for="name">Nama Produk <sub class="text-muted">(Harus
                                    diisi)</sub></label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="thumbnail">Pilih thumbnail <sub class="text-muted">(Harus
                                    diisi)</sub></label> <br>

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
                                <input type="file" name="thumbnail" accept="image/*" class="dropzone"
                                    onchange="readURL(this)" style="position: absolute; z-index:3; top:0">
                            </div>

                            @error('thumbnail')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>

                        <fieldset class="form-group">
                            <label for="description">Deskripsi Produk <sub class="text-muted">(Harus
                                    diisi)</sub></label>
                            <textarea class="form-control" name="description" id="editor"
                                style="resize: none;">{{old('description')}}</textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="description_image">Pilih gambar deskripsi </label> <br>

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
                                <input type="file" name="description_image" accept="image/*" class="dropzone"
                                    onchange="readURL(this)" style="position: absolute; z-index:3; top:0">
                            </div>

                            @error('description_image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>

                    </div>

                </div>

                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Tambahkan Keunggulan Produk</b></h5>
                    <p>
                        Tambahkan keunggulan produk untuk menujukkan produk ini berbeda dengan produk yang beredar pada
                        pasaran.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg">

                        <fieldset class="form-group">
                            <label for="function">Fungsi Produk <sub class="text-muted">(Harus
                                    diisi)</sub></label>
                            <textarea class="form-control" name="function" id="editor"
                                style="resize: none;">{{old('function')}}</textarea>
                            @error('function')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="function_image">Pilih gambar deskripsi </label> <br>

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
                                <input type="file" name="function_image" accept="image/*" class="dropzone"
                                    onchange="readURL(this)" style="position: absolute; z-index:3; top:0">
                            </div>

                            @error('function_image')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                        </fieldset>

                    </div>

                </div>

                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Tambahkan Keunggulan Produk</b></h5>
                    <p>
                        Tambahkan keunggulan produk untuk menujukkan produk ini berbeda dengan produk yang beredar pada
                        pasaran.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg repeater">

                        <div data-repeater-list="advantages">
                            @if (old('advantages'))
                            @foreach (old('advantages') as $i => $advantage)
                            <div data-repeater-item>
                                <fieldset class="form-group">
                                    <label for="advantage_name">Keunggulan <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <input type="text" class="form-control" name="advantage_name"
                                        value="{{old('advantages.'.$i.'.advantage_name')}}" />
                                    @error('advantages.'.$i.'.advantage_name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="advantage_description">Deskripsi keunggulan <sub
                                            class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <textarea class="form-control" name="advantage_description"
                                        style="resize: none; height: 80px;">{{old('advantages.'.$i.'.advantage_description')}}</textarea>
                                    @error('advantages.'.$i.'.advantage_description')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </fieldset>
                            </div>
                            @endforeach
                            @else
                            <div data-repeater-item>
                                <fieldset class="form-group">
                                    <label for="advantage_name">Keunggulan <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <input type="text" class="form-control" name="advantage_name" value="" />
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="advantage_description">Deskripsi keunggulan <sub
                                            class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <textarea class="form-control" name="advantage_description"
                                        style="resize: none; height: 80px;"></textarea>
                                </fieldset>
                            </div>
                            @endif
                        </div>


                        <fieldset class="form-group row">
                            <div class="col-6">
                                <input data-repeater-create class="btn btn-primary rounded-lg shadow-lg" type="button"
                                    value="+ Keunggulan" />
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-dark rounded-lg">Simpan</button>
                            </div>
                        </fieldset>

                    </div>

                </div>

            </div>

        </form>
    </div>

</div>
@endsection

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
