@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Lead</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.lead.index')}}">Lead</a></li>
    <li class="breadcrumb-item active">Edit</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">

            <form action="{{route('adm.lead.update', $lead->id)}}" method="POST">
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
                        <h5 class="card-title text-uppercase"><b>Detail Lead</b></h5>
                        <p>
                            Ini adalah detail lead yang didapatkan dari halaman cek ketersediaan website. Anda hanya
                            bisa melakukan pengubahan <b>Status Lead</b>.
                        </p>
                    </div>

                    <div class="col-12 col-lg-8">

                        <div class="white-box shadow-sm rounded-lg">

                            <fieldset class="form-group">
                                <label for="name">Nama lengkap</label>
                                <div class="form-control bg-light">{{$lead->name}}</div>
                            </fieldset>

                            <fieldset class="form-group row">
                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                    <label for="product">Produk yang diminati</label>
                                    <div class="form-control text-capitalize bg-light">{{$lead->product->name}}</div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="regency">Kabupaten/Kota</label>
                                    <div class="form-control text-capitalize bg-light">{{$lead->regency->name}}</div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group row">

                                <div class="col-12 col-md-6">
                                    <label for="status">Status lead</label>
                                    <select name="status" class="form-control select_searchable">
                                        @foreach ($statuses as $status)
                                        <option value="{{$status['slug_name']}}"
                                            {{$lead->status === $status['slug_name'] ? 'selected' : ''}}>
                                            {{$status['name']}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone">No. Telp.</label>
                                    <div class="form-control text-capitalize bg-light">{{$lead->phone}}</div>
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <label for="note">Catatan</label>
                                <div class="form-control" style="overflow-y: scroll; height: 120px">
                                    {{$lead->note}}
                                </div>
                            </fieldset>

                            <fieldset class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="is_readed" id="is_readed"
                                        {{$lead->is_readed == 1 ? '' : 'checked'}}>
                                    <label class="custom-control-label" for="is_readed">
                                        Tandai belum dibaca
                                    </label>
                                </div>
                                @error('is_readed')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </fieldset>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-dark rounded-lg font-light">Simpan</button>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
