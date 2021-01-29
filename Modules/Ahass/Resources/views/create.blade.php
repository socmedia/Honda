@extends('layouts.master')

@section('content')


<x-bootstrap.breadcrumb>
    <x-slot name="page">Ahass</x-slot>
    <li class="breadcrumb-item"> <a href="">Admin</a></li>
    <li class="breadcrumb-item active">Ahass</li>
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
                <h5 class="card-title text-uppercase"><b>Tambahkan Ahass</b></h5>
                <p>
                    Anda bisa melakukan penambahan data Ahass dengan mengisikan form disamping.
                </p>
            </div>

            <div class="col-12 col-lg-8">

                <form action="{{route('adm.ahass.store')}}" method="POST">
                    @csrf

                    <div class="white-box rounded-lg shadow-sm">


                        <fieldset class="form-group">
                            <label for="name">Nama Ahass <sub class="text-muted">(Harus diisi)</sub></label>
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

                        <fieldset class="form-group row">

                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="">No. Telp. 1 <sub class="text-muted">(Harus diisi)</sub></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select name="" class="form-control select">
                                            <option value="" disabled selected>Jenis Telp</option>
                                            <option value="mobilephone">Mobile Phone</option>
                                            <option value="phone">Telpon</option>
                                        </select>
                                    </div>
                                    <input type="text" name="phone_1" class="form-control" value="{{old('phone_1')}}"
                                        data-input="" readonly>
                                </div>
                                @error('phone_1')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="">No. Telp. 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select name="" class="form-control select">
                                            <option value="" disabled selected>Jenis Telp</option>
                                            <option value="mobilephone">Mobile Phone</option>
                                            <option value="phone">Telpon</option>
                                        </select>
                                    </div>
                                    <input type="text" name="phone_2" class="form-control" value="{{old('phone_2')}}"
                                        data-input="" readonly>
                                </div>
                                @error('phone_2')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                        </fieldset>

                        <div class="row">
                            <div class="col-12 text-right">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"
    integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA=="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.select_searchable').selectpicker({
            placeholder: 'Pilih kota',
            liveSearch: true
        });

        $('.select').selectpicker();


        function initMasking(){
            $('[data-input="phone"]').mask('00000000000');
            $('[data-input="mobilephone"]').mask('(62) 0000-0000-0000');
        }

        $('.select').change(function () {
            $(this).parents('.input-group').find('[data-input]').val('');
            $(this).prop('readonly', true)
            $(this).parent().find('button').prop('readonly', true)
            $(this).parents('.input-group').find('[data-input]').removeAttr('readonly')
            if($(this).val() === 'mobilephone'){
                $(this).parents('.input-group').find('[data-input]').attr('data-input', 'mobilephone')
            }
            if($(this).val() === 'phone'){
                $(this).parents('.input-group').find('[data-input]').attr('data-input', 'phone')
            }
            initMasking();
        })
    })
</script>
@endpush
