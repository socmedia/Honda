@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Aksesoris</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.accessories.index')}}">Aksesoris</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="card mb-5 shadow-sm rounded-lg">

        <div class="card-body py-5">
            <div class="row">

                <div class="col-12 col-md-5 mb-5 mb-md-0 text-center">
                    <img src="{{route('get.accessory', $accessory->image)}}" alt="{{$accessory->name}}">
                </div>

                <div class="col-12 col-md-7">
                    <h2 class="h3 font-bold mb-3">{{$accessory->name}}</h2>

                    <div class="list-group">

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="font-bold mb-1">Aksesoris</h5>
                            <small class="badge badge-danger text-uppercase font-bold">
                                Honda {{$accessory->product->name}}
                            </small>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="font-bold mb-1">Harga</h5>
                            </div>
                            <p class="mb-1">Rp. {{$accessory->price}}</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="font-bold mb-1">Pilihan Warna</h5>
                            <div class="d-flex">
                                @foreach (explode(',', $accessory->colors) as $color)
                                <div class="p-3 rounded-circle mr-2" style="background-color: {{$color}}"></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="font-bold mb-1">Kegunaan</h5>
                            {!! $accessory->function !!}
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <h5 class="font-bold mb-1">Bahan</h5>
                            {!! $accessory->material !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function initSelect() {
    $('.select_searchable').selectpicker({
        placeholder: 'Pilih kota',
        liveSearch: true
    });
}

$(document).ready(function() {
    initSelect();
})

document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('element.initialized', function(el, component) {
        initSelect();
    })
});
</script>
@endpush
