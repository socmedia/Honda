@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Aksesoris</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.accessories.index')}}">Aksesoris</a></li>
    <li class="breadcrumb-item active">Tambah</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <form action="{{route('adm.accessories.store')}}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="card-title text-uppercase"><b>Tambahkan Aksesoris</b></h5>
                        <p>
                            Anda bisa melakukan penambahan data Aksesoris dengan mengisikan form disamping.
                        </p>
                    </div>

                    <div class="col-12 col-lg-8">

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group">
                                <label for="image">Pilih gambar aksesoris <sub class="text-muted">(Harus
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
                                                    <img src="" class="w-50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="image" accept="image/*" class="dropzone"
                                        onchange="readURL(this)" style="position: absolute; z-index:3; top:0">
                                </div>

                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                            </fieldset>

                            <fieldset class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                    <label for="name">Nama aksesoris <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="parts_number">Parts number <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <input type="text" class="form-control" name="parts_number"
                                        value="{{old('parts_number')}}">
                                    @error('parts_number')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>

                            <fieldset class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                    <label for="price">Harga aksesoris <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="price" maxlength="20" class="form-control numeric"
                                            placeholder="" value="{{old('price')}}">
                                    </div>
                                    @error('price')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="product">Motor <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <select name="product" class="form-control select_searchable">
                                        <option value="" disabled {{old('product') ? '' : 'selected'}}>Pilih Motor
                                        </option>
                                        @foreach ($products as $product)
                                        <option value="{{$product->id}}"
                                            {{old('product') === $product->id ? 'selected' : ''}}>
                                            {{$product->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('product')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>

                            <fieldset class="form-group">

                                <label for="colors">Warna aksesoris <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <div class="color-picker">
                                    <div class="clone-box">
                                        <div class="color-picker-display">
                                            <input type="color" name="colors[]"
                                                onchange="changeParentBackgroundColor($(this))" />
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-action="clone-color-picker">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-action="remove-last-color" disabled>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                @error('colors')
                                <small class="text-danger">{{$message}}</small>
                                @enderror

                            </fieldset>

                            <fieldset class="form-group">
                                <label for="function">Kegunaan aksesoris <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <textarea class="form-control" id="editor" style="resize: none; height: 120px"
                                    name="function">{{old('function')}}</textarea>
                                @error('function')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="material">Bahan aksesoris <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <textarea class="form-control" id="editor" style="resize: none; height: 120px"
                                    name="material">{{old('material')}}</textarea>
                                @error('material')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="show_in_catalogue"
                                        id="show_in_catalogue" checked>
                                    <label class="custom-control-label" for="show_in_catalogue">
                                        Tampilkan di katalog
                                    </label>
                                </div>
                                @error('show_in_catalogue')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-dark rounded-lg font-light"
                                    data-action="save">Simpan</button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).parents('.dropzone-wrapper').find('img').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$('.select_searchable').selectpicker({
    placeholder: 'Pilih kota',
    liveSearch: true
});

function initNumericElement() {
    $('.numeric').on('input', function(event) {
        this.value = this.value.replace(/[^0-9+]/g, '');
    });

    $('.numeric').mask('000.000.000.000.000', {
        reverse: true
    });
}

initNumericElement();

$(".repeater").repeater({
    show: function() {
        $(this).slideDown()
    },
    hide: function(e) {
        confirm("Anda yakin akan menghapus elemen ini ?") && $(this).slideUp(e)
    }
})

$(document).ready(function() {
    const el = document.querySelectorAll('.input_tag');
    el.forEach((el) => {
        const tagging = new Tagify(el);
    })

    $('[data-action="clone-color-picker"]').click(async function() {
        $('.color-picker-display').last().clone().appendTo('.color-picker .clone-box');
        $('.color-picker-display').last().css('background', 'unset');
        $('.color-picker-display').last().find('input').val('#ffffff');
        if ($('.clone-box').children().length >= 1) {
            $('[data-action="remove-last-color"]').prop('disabled', false)
        }
    })

    $('[data-action="remove-last-color"]').click(async function() {
        if ($('.clone-box').children().length > 1) {
            $('.clone-box').children().last().remove();
        }

        if ($('.clone-box').children().length < 2) {
            $('[data-action="remove-last-color"]').prop('disabled', true);
        }
    })

})

function changeParentBackgroundColor(el) {
    return el.parent().css('background', el.val());
}
</script>
@endpush