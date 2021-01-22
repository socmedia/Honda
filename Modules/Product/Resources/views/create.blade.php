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
        <!-- <textarea name="" id="editor" cols="30" rows="10"></textarea> -->
    </div>

</div>
@endsection

@push('styles')
<style>
.box {
    position: relative;
    background: #ffffff;
    width: 100%;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
    border-bottom: 1px solid #f4f4f4;
    margin-bottom: 10px;
}

.box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
}

.dropzone-wrapper {
    border: 2px dashed #91b0b3;
    color: #92b0b3;
    position: relative;
    min-height: 150px;
    overflow: hidden;
}

.dropzone-wrapper .text {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%)
}

.dropzone,
.dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 100%;
    cursor: pointer;
    opacity: 0;
}

.preview-zone {
    text-align: center;
}

.preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0;
}

progress {
    position: absolute;
    display: flex;
    width: 80%;
    bottom: .5rem;
    left: 50%;
    transform: translateX(-50%)
}
</style>
@endpush

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