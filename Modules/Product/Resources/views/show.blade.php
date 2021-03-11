@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Produk</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.hgp.index')}}">Produk</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="card bg-white shadow-sm rounded-lg">
        <div class="card-body">

            @foreach ($product->banners as $banner)
            <img class="img-fluid"
                src="{{route('get.product', [explode('/', $banner->banner_name)[2], explode('/', $banner->banner_name)[3]])}}"
                alt="{{$product->slug_name}}">
            @endforeach

            <div class="row">
                <div class="col-12">

                    <h3 class="h3 font-light text-uppercase text-center text-danger my-5">Varian Honda
                        {{$product->name}}</h3>

                    <div class="swiper-container slider pb-4">
                        <div class="swiper-wrapper">
                            @foreach ($product->varians as $varian)
                            <div class="swiper-slide">
                                <img style="width: 300px" loading="lazy"
                                    src="{{route('get.product', [explode('/', $varian->image_name)[2], explode('/', $varian->image_name)[3]])}}"
                                    alt="{{$product->name}}">
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>

                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">

                    <h3 class="h3 font-light text-uppercase text-center text-danger my-5">Fitur Honda {{$product->name}}
                    </h3>

                    <div class="row">
                        @foreach ($product->features as $feature)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <figure>
                                <img class="img-fluid mb-3" loading="lazy"
                                    src="{{route('get.product', [explode('/', $feature->image_name)[2], explode('/', $feature->image_name)[3]])}}"
                                    alt="{{$product->name}}">
                                <figcaption>
                                    <h4 class="font-bold">{{$feature->title}}</h4>
                                    <p>{{$feature->description}}</p>
                                </figcaption>
                            </figure>

                        </div>
                        @endforeach
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12">

                    <h3 class="h3 font-light text-uppercase text-center text-danger my-5">Kapasitas Honda
                        {{$product->name}}</h3>

                    <div class="row">
                        <div class="col-12 mb-5">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-engine-tab" data-toggle="pill"
                                        href="#pills-engine" role="tab" aria-controls="pills-engine"
                                        aria-selected="true">Mesin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-frame-tab" data-toggle="pill" href="#pills-frame"
                                        role="tab" aria-controls="pills-frame" aria-selected="false">Rangka & Kaki
                                        Kaki</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-dimension-tab" data-toggle="pill"
                                        href="#pills-dimension" role="tab" aria-controls="pills-dimension"
                                        aria-selected="false">Dimensi & Berat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-capacity-tab" data-toggle="pill"
                                        href="#pills-capacity" role="tab" aria-controls="pills-capacity"
                                        aria-selected="false">Kapasitas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-electricity-tab" data-toggle="pill"
                                        href="#pills-electricity" role="tab" aria-controls="pills-electricity"
                                        aria-selected="false">Kelistrikan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-engine" role="tabpanel"
                                    aria-labelledby="pills-engine-tab">
                                    <x-product.engine :engine="json_decode($engine)" />
                                </div>
                                <div class="tab-pane fade" id="pills-frame" role="tabpanel"
                                    aria-labelledby="pills-frame-tab">
                                    <x-product.frame :frame="json_decode($frame)" />
                                </div>
                                <div class="tab-pane fade" id="pills-dimension" role="tabpanel"
                                    aria-labelledby="pills-dimension-tab">
                                    <x-product.dimension :dimension="json_decode($dimension)" />
                                </div>
                                <div class="tab-pane fade" id="pills-capacity" role="tabpanel"
                                    aria-labelledby="pills-capacity-tab">
                                    <x-product.capacity :capacity="json_decode($capacity)" />
                                </div>
                                <div class="tab-pane fade" id="pills-electricity" role="tabpanel"
                                    aria-labelledby="pills-electricity-tab">
                                    <x-product.electricity :electricity="json_decode($electricity)" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-light px-5 py-3 text-center">
                            <a href="{{route('get.product.brochure', explode('/', $product->brochure)[3])}}"
                                target="_blank" class="btn btn-danger"><i
                                    class="fas fa-fw fa-cloud-download-alt mr-2"></i>
                                Brochure</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>

</div>
@endsection
