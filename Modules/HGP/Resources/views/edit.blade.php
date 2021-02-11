@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Genuine Parts</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.hgp.index')}}">Genuine Parts</a></li>
    <li class="breadcrumb-item active">Edit</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">


    <div class="row">
        <div class="col-12 text-right mb-3">
            <a href="{{route('adm.hgp.edit.advantage', $hgp->id)}}" class="btn btn-primary shadow-lg">Edit
                Keunggulan</a>
        </div>
        <div class="col-12">

            <form action="{{route('adm.hgp.update', $hgp->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

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
                        <h5 class="card-title text-uppercase"><b>Edit Genuine Parts</b></h5>
                        <p>
                            Anda bisa melakukan penambahan data Genuine Parts dengan mengisikan form disamping.
                        </p>
                    </div>

                    <div class="col-12 col-lg-8">

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group">
                                <label for="name">Nama Produk <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <input type="text" class="form-control" name="name" value="{{$hgp->name}}">
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
                                                    <img src="{{route('get.genuine_part', $hgp->thumbnail)}}"
                                                        class="w-50">
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
                                    style="resize: none;">{{$hgp->description}}</textarea>
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
                                                    <img src="{{route('get.genuine_part', $hgp->description_image)}}"
                                                        class="w-50">
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
                        <h5 class="card-title text-uppercase"><b>Edit Keunggulan Produk</b></h5>
                        <p>
                            Edit keunggulan produk untuk menujukkan produk ini berbeda dengan produk yang beredar pada
                            pasaran.
                        </p>
                    </div>

                    <div class="col-12 col-lg-8">

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group">
                                <label for="function">Kegunaan Produk <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <textarea class="form-control" name="function" id="editor"
                                    style="resize: none;">{{$hgp->function}}</textarea>
                                @error('function')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="function_image">Pilih Gambar Kegunaan </label> <br>

                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <p class="text">
                                            Pilih Gambar atau Letakkan Gambar Disini.<br>
                                            <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                        </p>
                                        <div class="preview-zone">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <img src="{{route('get.genuine_part', $hgp->function_image)}}"
                                                        class="w-50">
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

                            <fieldset class="form-group">
                                <div class="text-right">
                                    <button class="btn btn-dark rounded-lg">Simpan</button>
                                </div>
                            </fieldset>

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
            console.log(input)
            $(input).parents('.dropzone-wrapper').find('img').attr('src', e.target.result)
            // $('input[type="file"]').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
</script>
@endpush