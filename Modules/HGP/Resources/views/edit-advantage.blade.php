@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Genuine Parts</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.hgp.index')}}">Genuine Parts</a></li>
    <li class="breadcrumb-item active">Edit Keunggulan</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">
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
            <h5 class="card-title text-uppercase"><b>Tambah Keunggulan Produk</b></h5>
            <p>
                Tambah keunggulan produk untuk menujukkan produk ini berbeda dengan produk yang beredar pada
                pasaran.
            </p>
        </div>

        <div class="col-12 col-lg-8">

            <div class="white-box shadow-sm rounded-lg">
                <form action="{{route('adm.hgp.store.advantage', $hgp->id)}}" method="POST">
                    @csrf

                    <fieldset class="form-group">
                        <label for="c_advantage_name">Keunggulan <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <input type="text" class="form-control" name="c_advantage_name"
                            value="{{old('c_advantage_name')}}" />
                        @error('c_advantage_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="c_advantage_description">Deskripsi keunggulan <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <textarea class="form-control" name="c_advantage_description"
                            style="resize: none; height: 80px;">{{old('c_advantage_description')}}</textarea>
                        @error('c_advantage_description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="text-right">
                            <button type="button" class="btn btn-dark rounded-lg"
                                onclick="$(this).parents('form').submit()">Simpan</button>
                        </div>
                    </fieldset>
                </form>
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

            @foreach ($hgp->advantages as $i => $advantage)
            <div class="white-box shadow-sm rounded-lg">

                <form action="{{route('adm.hgp.update.advantage', $advantage->id)}}" method="POST">
                    @csrf
                    @method('put')

                    <fieldset class="form-group">
                        <label for="advantage_name">Keunggulan
                            <sub class="text-muted">(Harus diisi)</sub>
                        </label>
                        <input type="text" class="form-control" name="advantage_name" value="{{$advantage->title}}" />
                        @error('advantage_name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="advantage_description">Deskripsi keunggulan <sub class="text-muted">(Harus
                                diisi)</sub></label>
                        <textarea class="form-control" name="advantage_description"
                            style="resize: none; height: 80px;">{{$advantage->description}}</textarea>
                        @error('advantage_description')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </fieldset>

                    <fieldset class="form-group">
                        <div class="text-right">
                            <button type="button" class="btn btn-danger rounded-lg"
                                data-url="{{route('adm.hgp.destroy.advantage', $advantage->id)}}"
                                onclick="$('#delete-confirmation').modal('show'); $('#delete-confirmation').find('form').attr('action', $(this).data('url'))">Hapus</button>
                            <button class="btn btn-dark rounded-lg">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            @endforeach

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