@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Promo</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.promo.index')}}">Promo</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="white-box shadow-sm rounded-lg">

        <div class="card-body">

            <div class="row">

                <div class="col-12 m-auto">
                    <article class="article preview">
                        <div class="article-header custom">
                            <div class="article-title">
                                <h2 class="font-bold" style="line-height: normal">{{$promo->title}}</h2>
                                <div class="article-category">
                                    <a>{{$promo->created_at->diffForHumans()}}</a>
                                </div>
                            </div>
                            <img class="article-thumbnail" src="{{route('get.promo', explode('/', $promo->image))}}"
                                alt="">
                        </div>
                    </article>
                </div>

                <div class="col-12 m-auto">
                    <article class="article preview article-style-c">
                        <div class="article-details">
                            <h4 class="font-bold">Keterangan Promo:</h4>
                            <p>
                                {!! $promo->subject !!}
                            </p>
                        </div>
                    </article>
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