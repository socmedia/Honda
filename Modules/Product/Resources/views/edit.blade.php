@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Produk</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.product.index')}}">Produk</a></li>
    <li class="breadcrumb-item active">Edit</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h3 class="card-title mb-5">Edit produk</h3>
        </div>
    </div>

    <div class="col-12">

        @livewire('product.edit', ['product' => $product])

    </div>

</div>
@endsection

@push('scripts')
<script>
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

function initSelect() {
    $('.select_searchable').selectpicker({
        placeholder: 'Pilih kota',
        liveSearch: true
    });
}

function initNumericElement() {
    $('.numeric').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('.numeric').mask('00');
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(input).parents('.dropzone-wrapper').find('img').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

document.addEventListener("updated-var", () => {
    initNumericElement();
    initSelect();
});
</script>
@endpush