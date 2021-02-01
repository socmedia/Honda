@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Dealer</x-slot>
    <li class="breadcrumb-item"> <a href="{{route('adm.dashboard.index')}}">Admin</a></li>
    <li class="breadcrumb-item"> <a href="{{route('adm.dealer.index')}}">Dealer</a></li>
    <li class="breadcrumb-item active">Tambah</li>
</x-bootstrap.breadcrumb>

<div class="container-fluid">

    <div class="col-12">
        <div class="row">
            @if (session()->has('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hebat ! </strong> {!!session()->get('success')!!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

            <div class="col-12 col-lg-4">
                <h5 class="card-title text-uppercase"><b>Tambahkan Dealer</b></h5>
                <p>
                    Anda bisa melakukan penambahan data Dealer dengan mengisikan form disamping.
                </p>
            </div>

            <div class="col-12 col-lg-8">

                <form action="{{route('adm.dealer.store')}}" method="POST">
                    @csrf

                    <div class="white-box rounded-lg shadow-sm repeater">

                        <fieldset class="form-group">
                            <label for="name">Nama Dealer <sub class="text-muted">(Harus diisi)</sub></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="address">Alamat lengkap <sub class="text-muted">(Harus
                                    diisi)</sub></label>
                            <textarea name="address" style="resize: none; height:80px;"
                                class="form-control">{{old('address')}}</textarea>
                            @error('address')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">

                            <label for="city">Kota <sub class="text-muted">(Harus diisi)</sub></label>
                            <select name="city" class="form-control select_searchable">
                                <option value="" disabled selected>Pilih kota</option>
                                @foreach ($regencies as $city)
                                @if ($city->id == old('city'))
                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                @else
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endif
                                @endforeach
                                <select>
                                    @error('city')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror

                        </fieldset>

                        <fieldset class="form-group row " data-repeater-list="contacts">

                            @if (old('contacts'))
                            @foreach (old('contacts') as $i => $contact)
                            <div class="col-12 col-md-6 mb-3 mb-md-0" data-repeater-item>
                                <label for="contacts">No. Telp.</label>
                                <div class="input-group">
                                    <input type="text" name="contact" maxlength="15" minlength="6"
                                        class="form-control numeric" placeholder="00000000000000"
                                        value="{{$contact['contact']}}">

                                    <div class="input-group-append">
                                        <button data-repeater-delete
                                            class="btn btn-danger btn-sm rounded-right shadow-lg px-3" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="text-muted">Panjang Telp. antara 6-15 karakter</small><br>
                                @error('contacts.' . $i . '.contact')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            @endforeach
                            @else
                            <div class="col-12 col-md-6 mb-3 mb-md-0" data-repeater-item>
                                <label for="contacts">No. Telp.</label>
                                <div class="input-group">
                                    <input type="text" name="contact" maxlength="15" minlength="6"
                                        class="form-control numeric" placeholder="00000000000000" value="">

                                    <div class="input-group-append">
                                        <button data-repeater-delete
                                            class="btn btn-danger btn-sm rounded-right shadow-lg px-3" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <small class="text-muted">Panjang Telp. antara 6-15 karakter</small>
                                @endif

                        </fieldset>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <input data-repeater-create class="btn btn-primary rounded-lg shadow-lg" type="button"
                                    value="+ Telp" />
                            </div>
                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-dark rounded-lg font-light"
                                    data-action="save">Simpan</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.select_searchable').selectpicker({
        placeholder: 'Pilih kota',
        liveSearch: true
    });

    $('.select').selectpicker();

    $(".repeater").repeater({
        show: function() {
            $(this).slideDown()
            initNuericElement();
        },
        hide: function(e) {
            confirm("Anda yakin akan menghapus elemen ini ?") && $(this).slideUp(e)
        }
    })

    function initNuericElement() {
        $('.numeric').on('input', function(event) {
            this.value = this.value.replace(/[^0-9+]/g, '');
        });
    }

    initNuericElement();
})
</script>
@endpush