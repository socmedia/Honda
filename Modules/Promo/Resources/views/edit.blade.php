@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Promo</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.promo.index')}}">Promo</a></li>
    <li class="breadcrumb-item active">Edit</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="col-12">

        <form action="{{route('adm.promo.update', $promo->id)}}" method="POST" enctype="multipart/form-data">
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

                {{-- Promo/Event --}}
                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Ubah Thumbnail</b></h5>
                    <p>
                        Anda bisa melakukan penambahan Thumbnail dengan memilih gambar pada perangkat yang anda gunakan.
                        Anda tidak perlu memilih file jika tidak ada perubahan.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg">

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
                                                <img class="w-100"
                                                    src="{{route('get.promo', explode('/', $promo->image))}}" alt="">
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

                    </div>

                </div>

                {{-- Informasi Promo/Event --}}
                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Perbarui Informasi Promo/Event</b></h5>
                    <p>
                        Tambahkan Informasi seputar Promo/Kegiatan agar pembaca tau dengan apa yang disampaikan.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg repeater">

                        <fieldset class="form-group row">
                            <div class="col-12 col-md-8 mb-3 mb-md-0">
                                <label for="title">Judul Promo/Event
                                    <sub class="text-muted">(Harus diisi)</sub>
                                </label>
                                <input type="text" class="form-control" name="title"
                                    value="{{old('title') ? old('title') : $promo->title }}" />
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                <label for="type">Jenis Postingan
                                    <sub class="text-muted">(Harus diisi)</sub>
                                </label>
                                <select name="type" class="form-control select_searchable">
                                    <option value="" disabled selected>Pilih Jenis Postingan</option>
                                    @foreach ($types as $type)
                                    <option value="{{$type['slug_name']}}"
                                        {{$promo->blog_type === $type['slug_name'] ? 'selected' : '' }}>
                                        {{$type['name']}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('type')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="subject">Subjek
                                <sub class="text-muted">(Harus diisi)</sub>
                            </label>
                            <textarea class="form-control" name="subject" id="editor"
                                style="resize: none; height: 100px">{!! old('subject') ? old('subject') : $promo->subject !!}</textarea>
                            @error('subject')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="draft" id="draft"
                                    {{$promo->published === 1 ? '' : 'checked'}}>
                                <label class="custom-control-label" for="draft">
                                    Simpan sebagai draft
                                </label>
                            </div>
                            @error('draft')
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
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const el = document.querySelectorAll('.input_tag');
    el.forEach((el) => {
        const tagging = new Tagify(el);
    })

    ClassicEditor.ui.view.editable.editableElement.style.height = '900px';
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