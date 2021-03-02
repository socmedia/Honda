@extends('layouts.master')

@section('content')
<x-bootstrap.breadcrumb>
    <x-slot name="page">Promo</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item active">Promo</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-6">
            <h3 class="card-title mb-5">Daftar Promo & Kegiatan</h3>
        </div>
        <div class="col-12 col-md-6 mb-3 text-right">
            <a href="{{route('adm.promo.create')}}" class="btn btn-primary">+ Promo/Kegiatan</a>
        </div>
    </div>

    <div class="col-12">
        @livewire('promo.table')
    </div>

</div>

<div class="modal fade" id="delete-confirmation" tabindex="-1" aria-labelledby="delete-confirmationLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content border-0">
            <div class="modal-header bg-danger text-white border-0">
                <h5 class="modal-title" id="delete-confirmationLabel">Hapus Data</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 1rem; top: 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0">
                Anda yakin akan menghapus data ini ?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg"
                    data-dismiss="modal">Batal</button>
                <form action="" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger shadow-sm rounded-lg">Hapus</button>
                </form>
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