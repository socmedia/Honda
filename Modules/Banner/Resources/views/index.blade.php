@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Banner</x-slot>
    <li class="breadcrumb-item"> <a href="">Admin</a></li>
    <li class="breadcrumb-item active">Banner</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-12">
            <h3 class="card-title mb-5"></h3>

            <div class="box-white">
                Hello from Banner !
            </div>

        </div>
    </div>

</div>
@endsection