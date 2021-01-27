@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Produk</x-slot>
    <li class="breadcrumb-item"> <a href="">Admin</a></li>
    <li class="breadcrumb-item active">Produk</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-6">
            <h3 class="card-title mb-5">Semua produk</h3>
        </div>
        <div class="col-6 text-right">
            <a href="{{route('adm.product.create')}}" class="btn btn-primary">Tambah Produk</a>
        </div>
    </div>

    <div class="col-12">
        @livewire('product.table', ['products' => $products])
    </div>

</div>

@endsection
