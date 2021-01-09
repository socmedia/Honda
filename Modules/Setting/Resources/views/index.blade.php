@extends('layouts.master')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Pengaturan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="">Admin</a></li>
                    <li class="breadcrumb-item active">Pengaturan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="card-title mb-5">Pengaturan Informasi</h3>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <h5 class="card-title text-uppercase"><b>Informasi Perusahaan</b></h5>
                    <p>
                        Perbarui informasi perusahaan dengan mengubah form disamping.
                    </p>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="white-box rounded-lg">
                        <form action="" method="POST">
                            @csrf
                            @method('put')

                            <fieldset class="form-group row">
                                <div class="col-12">
                                    <textarea name="address" style="resize: none; height: 200px" class="form-control">
                                        {{$info->address}}
                                    </textarea>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{$info->phone}}">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label>Fax</label>
                                    <input type="text" class="form-control" value="{{$info->fax}}">
                                </div>
                            </fieldset>

                            <fieldset class="form-group text-right">
                                <button class="btn btn-dark rounded-lg font-light">Simpan</button>
                            </fieldset>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
