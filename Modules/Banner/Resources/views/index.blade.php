@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Banner</x-slot>
    <li class="breadcrumb-item"> <a href="">Admin</a></li>
    <li class="breadcrumb-item active">Banner</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-6">
            <h3 class="card-title mb-5">Semua banner</h3>
        </div>
        <div class="col-12 col-md-6 text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('adm.banner.export.excel')}}" target="_blank">
                            <i class="fa fa-file-excel mr-3"></i> Excell
                        </a>
                    </div>
                </div>
                <a href="{{route('adm.banner.create')}}" class="btn btn-primary"> + Banner</a>
            </div>
        </div>
    </div>

    <div class="col-12">
        @livewire('banner.table')
    </div>

</div>

@endsection
