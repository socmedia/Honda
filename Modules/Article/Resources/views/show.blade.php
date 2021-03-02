@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Artikel</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.article.index')}}">Artikel</a></li>
    <li class="breadcrumb-item active">Preview</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="white-box shadow-sm rounded-lg">

        <div class="card-body">

            <div class="row">

                <div class="col-12 col-sm-10 col-md-9 m-auto">
                    <article class="article preview">
                        <div class="article-header custom">
                            <div class="article-title">
                                <h2 class="font-bold" style="line-height: normal">{{$article->title}}</h2>
                                <div class="article-category">
                                    <a>{{$article->created_at->diffForHumans()}}</a>
                                </div>
                            </div>
                            <img class="article-thumbnail" src="{{route('get.article', explode('/', $article->image))}}"
                                alt="">
                        </div>
                    </article>
                </div>

                <div class="col-12 col-sm-10 col-md-8 m-auto">
                    <article class="article preview article-style-c">
                        <div class="article-details">
                            <p>
                                {!! $article->description !!}
                            </p>
                        </div>
                        <div class="px-3">
                            @foreach (json_decode($article->tags) as $tag)
                            <a href="" class="bg-light text-dark px-2 py-1 mr-2 d-inline-block rounded-lg">
                                # {{$tag->value}}
                            </a>
                            @endforeach
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
