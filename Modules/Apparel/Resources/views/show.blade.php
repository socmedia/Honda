@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Apparel</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.apparel.index')}}">Apparel</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    {{-- <div class="white-box shadow-sm rounded-lg"> --}}

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">

                <div class="col-12 col-md-5 mb-5 mb-md-0 text-center">

                    <div class="swiper-container swiper pb-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{route('get.apparel', $apparel->thumbnail)}}" alt="{{$apparel->name}}">
                            </div>
                            @foreach ($apparel->images as $image)
                            <div class="swiper-slide">
                                <img src="{{route('get.apparel', $image->image)}}" alt="{{$apparel->name}}">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{route('get.apparel', $apparel->thumbnail)}}" alt="{{$apparel->name}}">
                            </div>
                            @foreach ($apparel->images as $image)
                            <div class="swiper-slide">
                                <img src="{{route('get.apparel', $image->image)}}" alt="{{$apparel->name}}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-7">

                    <h2 class="h3 font-bold mb-3">{{$apparel->name}}</h2>

                    <div class="list-group">

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="font-bold mb-1">Kategori</h5>
                                <small class="badge badge-danger text-uppercase font-light">
                                    {{$apparel->category}}
                                </small>
                            </div>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="font-bold mb-1">Harga</h5>
                            </div>
                            <p class="mb-1">Rp. {{$apparel->price}}</p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="font-bold mb-1">Ukuran</h5>
                            </div>
                            <p class="mb-1">
                                @foreach (json_decode($apparel->sizes) as $size)
                                <span class="badge badge-danger text-uppercase">{{$size->value}}</span>
                                @endforeach
                            </p>
                        </div>

                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="font-bold mb-1">Bahan</h5>
                            </div>
                            <p class="mb-1">
                                {!! $apparel->materials !!}
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- </div> --}}
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