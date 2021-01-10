@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Pengaturan</x-slot>
    <li class="breadcrumb-item"><a href="">Admin</a></li>
    <li class="breadcrumb-item active">Pengaturan</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-12">
            <h3 class="card-title mb-5">Pengaturan Informasi</h3>

            @livewire('setting.update-info')

            @livewire('setting.update-social')

        </div>
    </div>

</div>
@endsection
