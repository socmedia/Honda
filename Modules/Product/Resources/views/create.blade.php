@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Produk</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.product.index')}}">Produk</a></li>
    <li class="breadcrumb-item active">Tambah</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h3 class="card-title mb-5">Tambah produk</h3>
        </div>
    </div>

    <div class="col-12">

        @livewire('product.create', ['product' => $product])

    </div>

</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {

    $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
})
</script>
@endpush