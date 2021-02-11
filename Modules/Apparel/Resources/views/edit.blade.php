@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Apparel</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.apparel.index')}}">Apparel</a></li>
    <li class="breadcrumb-item active">Edit</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 text-right mb-3">
            <a href="{{route('adm.apparel.editImage', $apparel->id)}}" class="btn btn-primary shadow-lg">
                Edit Gambar
            </a>
        </div>

        <div class="col-12">

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
                    <h5 class="card-title text-uppercase"><b>Edit Apparel</b></h5>
                    <p>
                        Anda bisa melakukan penambahan data Apparel dengan mengisikan form disamping.
                    </p>
                </div>

                <div class="col-12 col-lg-8">
                    <form action="{{route('adm.apparel.update', $apparel->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                    <label for="name">Nama Produk <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <input type="text" class="form-control tag" name="name"
                                        value="{{old('name') ? old('name') : $apparel->name}}">
                                    @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="category">Kategori produk <sub class="text-muted">(Harus
                                            diisi)</sub></label>
                                    <select name="category" class="form-control select_searchable">
                                        <option value="" disabled {{old('category') ? '' : 'selected'}}>Pilih kategori
                                        </option>
                                        @if (old('category'))
                                        @foreach ($categories as $category)
                                        <option value="{{$category['slug_name']}}"
                                            {{old('category') === $category['slug_name'] ? 'selected' : ''}}>
                                            {{$category['name']}}
                                        </option>
                                        @endforeach
                                        @else
                                        @foreach ($categories as $category)
                                        <option value="{{$category['slug_name']}}"
                                            {{$apparel->category === $category['slug_name'] ? 'selected' : ''}}>
                                            {{$category['name']}}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('category')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="thumbnail">Pilih thumbnail
                                    <sub class="text-muted">(Kosongkan jika tidak ada perubahan)</sub>
                                </label> <br>

                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <p class="text">
                                            Pilih Gambar atau Letakkan Gambar Disini.<br>
                                            <small class="text-muted">Format gambar: jpg, jpeg, png, webp</small>
                                        </p>
                                        <div class="preview-zone">
                                            <div class="box box-solid">
                                                <div class="box-body">
                                                    <img src="{{route('get.apparel', $apparel->thumbnail)}}"
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

                            <fieldset class="form-group row">

                                <div class="col-12 col-md-6 mb-3 mb-lg-0">
                                    <label for="sizes">Ukuran Produk <sub class="text-muted">(Harus
                                            diisi, Pisahkan ukuran dengan menekan TAB)</sub></label>
                                    <input type="text" class="input_tag form-control" name="sizes"
                                        value="{{old('sizes') ? old('sizes') : $apparel->sizes}}">
                                    @error('sizes')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="price">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" name="price" maxlength="20" class="form-control numeric"
                                            placeholder="" value="{{old('price') ? old('price') : $apparel->price}}">
                                    </div>
                                    @error('price')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="materials">Bahan Produk <sub class="text-muted">(Harus
                                        diisi)</sub></label>
                                <textarea class="form-control" id="editor" style="resize: none; height: 120px"
                                    name="materials">{{old('materials') ? old('materials') : $apparel->materials}}</textarea>
                                @error('materials')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-dark rounded-lg font-light"
                                    data-action="save">Simpan</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

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

    $(document).ready(function() {
        const el = document.querySelectorAll('.input_tag');
        el.forEach((el) => {
            const tagging = new Tagify(el);
        })
    })
</script>
@endpush
