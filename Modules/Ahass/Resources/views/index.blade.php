@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Ahass</x-slot>
    <li class="breadcrumb-item"> <a href="">Admin</a></li>
    <li class="breadcrumb-item active">Ahass</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-6">
            <h3 class="card-title mb-5">Daftar Ahass</h3>
        </div>
        <div class="col-6 text-right">
            <a href="{{route('adm.ahass.create')}}" class="btn btn-primary">Tambah Ahass</a>
        </div>
    </div>

    <div class="col-12">
        @livewire('ahass.table')
        {{-- @livewire('ahass.table') --}}
    </div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.select_searchable').selectpicker({
            placeholder: 'Pilih kota',
            liveSearch: true
        });
    })
</script>
@endpush
