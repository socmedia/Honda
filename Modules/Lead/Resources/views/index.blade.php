@extends('layouts.master')

@section('content')

<x-bootstrap.breadcrumb>
    <x-slot name="page">Lead</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item active">Lead</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-md-6">
            <h3 class="card-title mb-5">Daftar Lead</h3>
        </div>
        <div class="col-12 col-md-6 mb-3 text-right">
            <div class="btn-group" role="group" aria-label="Basic example">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" style="cursor: pointer" onclick="$('#prompt').modal('show')">
                            <i class="fa fa-file-excel mr-3"></i> Excell
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        @livewire('lead.table')
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

<div class="modal fade" id="prompt" tabindex="-1" aria-labelledby="promtLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content border-0">
            <div class="modal-header bg-light border-0">
                <h5 class="modal-title" id="promtLabel">Pilih Tanggal Export</h5>
                <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 1rem; top: 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body border-0">

                <form action="{{route('adm.lead.export.excel')}}" target="_blank">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="today" name="date" class="custom-control-input" value="today">
                                <label class="custom-control-label" for="today">Hari ini</label>
                            </div>
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="this_week" name="date" class="custom-control-input"
                                    value="this_week">
                                <label class="custom-control-label" for="this_week">Minggu Ini</label>
                            </div>
                            <div class="custom-control custom-radio custom-control">
                                <input type="radio" id="this_month" name="date" class="custom-control-input"
                                    value="this_month">
                                <label class="custom-control-label" for="this_month">Bulan Ini</label>
                            </div>
                            <div class="custom-control custom-radio custom-control mb-3">
                                <input type="radio" id="custom" name="date" class="custom-control-input" value="custom">
                                <label class="custom-control-label" for="custom">Custom</label>
                            </div>
                            <div class="form-group d-none date_range_wrapper">
                                <label>Pilih tanggal</label>
                                <input type="text" name="custom_date" class="form-control date_range">
                            </div>
                        </div>
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-default text-dark shadow-sm rounded-lg mr-1"
                                data-dismiss="modal">Batal</button>
                            <button class="btn btn-dark shadow-sm rounded-lg">Export</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    function initSelect() {
        $('.select_searchable').selectpicker({
            placeholder: 'Pilih kota',
            liveSearch: true
        });
    }

    $(document).ready(function() {
        initSelect()

        $('.date_range').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            }
        })


        $('[name="date"]').change(function () {
            if($(this).val() === 'custom'){
                $('.date_range_wrapper').removeClass('d-none');
                $('.date_range_wrapper input').val('');
            }else{
                $('.date_range_wrapper').addClass('d-none');
            }
        })
    })

    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('element.initialized', function(el, component) {
            initSelect()
        })
    });
</script>
@endpush
