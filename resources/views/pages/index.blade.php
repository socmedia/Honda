@extends('layouts.guest')

@section('content')
<div class="banner">
    <img src="{{asset('images/homepage_banner.jpg')}}" alt="">
</div>

<main>
    <h1 class="header__text">semua produk</h1>

    <nav class="navigation__wrapper d-flex justify-content-center">
        <ul class="navigation__tabs">
            <li class="button active">
                <a>
                    New
                </a>
            </li>
            <li class="button">
                <a>
                    Cub
                </a>
            </li>
            <li class="button">
                <a>
                    Matic
                </a>
            </li>
            <li class="button">
                <a>
                    Sport
                </a>
            </li>
            <li class="button">
                <a>
                    Big Bike
                </a>
            </li>
        </ul>
    </nav>

    <div class="row p-0 m-0">
        <div class="col-6 col-md-4 col-lg-3 m-0 p-0">
            <div class="card product__card odd">
                <div class="product__image">
                    <img src="{{asset('images/genio.png')}}" alt="">
                </div>
                <span class="label">New</span>
                <div class="product__card-body">
                    <h2 class="product__name">Genio</h2>
                    <span class="text-half-opacity">Harga Mulai</span>
                    <h3 class="product__price">Rp. 17.680.000</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 m-0 p-0">
            <div class="card product__card even">
                <div class="product__image">
                    <img src="{{asset('images/genio.png')}}" alt="">
                </div>
                <span class="label">New</span>
                <div class="product__card-body">
                    <h2 class="product__name">Genio</h2>
                    <span class="text-half-opacity">Harga Mulai</span>
                    <h3 class="product__price">Rp. 17.680.000</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 m-0 p-0">
            <div class="card product__card odd">
                <div class="product__image">
                    <img src="{{asset('images/genio.png')}}" alt="">
                </div>
                <span class="label">New</span>
                <div class="product__card-body">
                    <h2 class="product__name">Genio</h2>
                    <span class="text-half-opacity">Harga Mulai</span>
                    <h3 class="product__price">Rp. 17.680.000</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 m-0 p-0">
            <div class="card product__card even">
                <div class="product__image">
                    <img src="{{asset('images/genio.png')}}" alt="">
                </div>
                <span class="label">New</span>
                <div class="product__card-body">
                    <h2 class="product__name">Genio</h2>
                    <span class="text-half-opacity">Harga Mulai</span>
                    <h3 class="product__price">Rp. 17.680.000</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 m-0 p-0">
            <div class="card product__card odd">
                <div class="product__image">
                    <img src="{{asset('images/genio.png')}}" alt="">
                </div>
                <span class="label">New</span>
                <div class="product__card-body">
                    <h2 class="product__name">Genio</h2>
                    <span class="text-half-opacity">Harga Mulai</span>
                    <h3 class="product__price">Rp. 17.680.000</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 py-5 text-center">
        <button class="btn btn-dark rounded-lg">Produk Lainnya</button>
    </div>
</main>

<main style="overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-8 mb-5 mb-lg-0">
                <h2 class="heading left">Simulasi Kredit</h2>

                <form action="" method="POST">

                    <fieldset class="form-group">
                        <label for="motor">Nama Produk</label>
                        <select name="motor" class="form-control">
                            <option value="" disabled selected>Pilih Motor</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="otr">Harga On The Road</label>
                        <input type="text" class="form-control bg-white" name="otr" id="" placeholder="0" readonly>
                    </fieldset>

                    <fieldset class="form-group row">
                        <div class="col-4">
                            <label for="dp">Uang Muka</label>
                            <input type="number" name="dp" id="" class="form-control">
                        </div>
                        <div class="col-8 align-self-end">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control bg-white" readonly>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="tenor">Tenor</label>
                        <select name="tenor" class="form-control">
                            <option value="" selected>12 Bulan</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group row">
                        <div class="col-4 mb-3 mb-lg-0">
                            <button class="btn btn-honda btn-block">Hitung</button>
                        </div>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <button class="btn btn-dark btn-block text-capitalize py-2" style="letter-spacing: 2px;">
                            Cari dealer
                        </button>
                    </fieldset>

                </form>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="heading right">Promo</h2>
            </div>
        </div>
    </div>
</main>
@endsection