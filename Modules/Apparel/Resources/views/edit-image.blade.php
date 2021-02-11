@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Apparel</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.apparel.index')}}">Apparel</a></li>
    <li class="breadcrumb-item active">Edit Gambar</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
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
                    <h5 class="card-title text-uppercase"><b>Tambahkan Gambar Produk</b></h5>
                    <p>
                        Gambar boleh dikosongkan. Pilihlah gambar yang menarik untuk menunjukkan detail produk atau
                        varian produk.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <form action="{{route('adm.apparel.storeImage', $apparel->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group">
                                <label for="image">Pilih Gambar</label> <br>

                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <p class="text">
                                            Pilih Gambar atau Letakkan Gambar Disini.<br>
                                            <small class="text-muted">Format gambar: jpg, jpeg, png,
                                                webp</small>
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

                                <div class="dropzone_box_clone"></div>

                                @error('image')
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

                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Edit Gambar Produk</b></h5>
                    <p>
                        Gambar boleh dikosongkan. Pilihlah gambar yang menarik untuk
                        menunjukkan detail produk atau varian produk.
                    </p>
                </div>

                <div class="col-12 col-lg-8">

                    <div class="white-box shadow-sm rounded-lg">

                        <div class="row">
                            @forelse ($apparel->images as $image)
                            <div class="col-6 col-md-4 mb-3">
                                <figure class="border position-relative">
                                    <button class="btn btn-danger btn-sm rounded-lg shadow-lg" type="button"
                                        data-url="{{route('adm.apparel.destroyImage', $image->id)}}"
                                        onclick="$('#delete-confirmation').modal('show'); $('#delete-confirmation').find('form').attr('action', $(this).data('url'))"
                                        style="position: absolute; right: 0; top: 0; z-index: 999">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <img src="{{route('get.apparel', $image->image)}}" class="w-100">
                                </figure>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-center mb-0">Produk ini tidak memiliki gambar selain <b>Thumbnail</b></p>
                            </div>
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="delete-confirmation" tabindex="-1" aria-labelledby="delete-confirmationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title" id="delete-confirmationLabel">Hapus Data</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 1rem; top: 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0">
                Anda yakin akan menghapus data ini ?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg"
                    data-dismiss="modal">Batal</button>
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger shadow-sm rounded-lg">Hapus</button>
                </form>
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

$(".repeater").repeater({
    show: function() {
        $(this).slideDown()
    },
    hide: function(e) {
        confirm("Anda yakin akan menghapus elemen ini ?") && $(this).slideUp(e)
    }
})
</script>
@endpush