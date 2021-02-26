@extends('layouts.guest')

@section('content')
<nav class="breadcrumb__wrapper" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cek Ketersediaan</li>
        </ol>
    </div>
</nav>

<main>
    <div class="container">
        @livewire('lead-form')
    </div>
</main>
@endsection
