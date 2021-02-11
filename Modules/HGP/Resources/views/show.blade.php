@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Genuine Parts</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.hgp.index')}}">Genuine Parts</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="white-box shadow-sm rounded-lg">

        <h1 class="h3 font-bold text-danger">{{$hgp->name}}</h1>

        <div class="card border rounded-lg mb-5  shadow-sm">
            <div class="card-body">
                <div class="row">
                    @if ($hgp->description_image)
                    <div class="col-12 col-md-4 text-center">
                        <img width="250" src="{{route('get.genuine_part', $hgp->description_image)}}"
                            alt="{{$hgp->name}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <p>
                            {!! $hgp->description !!}
                        </p>
                    </div>
                    @else
                    <div class="col-12 col-md-6 mb-3">
                        <p>
                            {!! $hgp->description !!}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card border rounded-lg mb-5 shadow-sm">
            <div class="card-body">


                <div class="row">

                    @if ($hgp->function_image)
                    <div class="col-12 col-md-6">
                        <h2 class="h3 font-light text-danger mb-3">
                            Kegunaan Honda {{$hgp->name}}
                        </h2>
                        <p>
                            {!! $hgp->function !!}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <img width="250" src="{{route('get.genuine_part', $hgp->function_image)}}" alt="{{$hgp->name}}">
                    </div>
                    @else
                    <div class="col-12 col-md-6 mb-3">
                        <p>
                            {!! $hgp->function !!}
                        </p>
                    </div>
                    @endif

                </div>
            </div>
        </div>


        <div class="card rounded-lg border shadow-sm">
            <div class="card-body">
                <h2 class="h3 font-light text-danger mb-3">
                    Keunggulan Honda {{$hgp->name}}
                </h2>
                <div class="row">

                    @foreach ($hgp->advantages as $advantage)
                    <div class="col-12 col-md-6">
                        <div class="card rounded-lg border">
                            <div class="card-body">
                                <p class="h3 font-bold">{{$advantage->title}}</p>
                                <p class="m-0">
                                    {{$advantage->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

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
    initSelect()
})

document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('element.initialized', function(el, component) {
        initSelect()
    })
});
</script>
@endpush
