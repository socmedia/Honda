@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Dashboard</x-slot>
    <li class="breadcrumb-item active">Admin</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-12">
            <h3 class="card-title mb-5"></h3>

            <div class="box-white">
                Hello from dashboard !
            </div>

        </div>
    </div>

</div>
@endsection