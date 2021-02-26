@extends('layouts.guest')

@section('content')
<div class="banner">
    <img src="{{asset('images/genio/77123 1.jpg')}}" alt="">
    <img src="{{asset('images/genio/40554 1.jpg')}}" alt="">
</div>

<main>
    <div class="container">
        <h1 class="header__text">varian warna genio</h1>

        <div class="text-center">
            <img class="w-50" src="{{asset('images/genio/83277.jpg')}}" alt="">
        </div>
    </div>

</main>

<main>
    <div class="container">

        <h1 class="header__text mb-5">Fitur genio</h1>

        <div class="row">

            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-lg-0">
                <img class="img-fluid" src="{{asset('images/genio/47951.jpg')}}" alt="">
                <p><b>Lampu Depan LED</b></p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
                </p>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-lg-0">
                <div class="card-body p-1">
                    <img class="img-fluid" src="{{asset('images/genio/47951.jpg')}}" alt="">
                    <p><b>Lampu Depan LED</b></p>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>
            </div>


            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-lg-0">
                <div class="card-body p-1">
                    <img class="img-fluid" src="{{asset('images/genio/47951.jpg')}}" alt="">
                    <p><b>Lampu Depan LED</b></p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse?
                    </p>
                </div>
            </div>


            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-lg-0">
                <div class="card-body p-1">
                    <img class="img-fluid" src="{{asset('images/genio/47951.jpg')}}" alt="">
                    <p><b>Lampu Depan LED</b></p>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio?
                    </p>
                </div>
            </div>



            <div class="col-6 col-md-4 col-lg-3 mb-3 mb-lg-0">
                <div class="card-body p-1">
                    <img class="img-fluid" src="{{asset('images/genio/47951.jpg')}}" alt="">
                    <p><b>Lampu Depan LED</b></p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, a.
                    </p>
                </div>
            </div>

        </div>
    </div>
</main>

<main>
    <div class="container">

        <h1 class="header__text">spesifikasi genio</h1>

        <nav class="navigation__wrapper">
            <ul class="navigation__tabs">
                <li class="button active">
                    <a>
                        Mesin
                    </a>
                </li>
                <li class="button">
                    <a>
                        Rangka & Kaki Kaki
                    </a>
                </li>
                <li class="button">
                    <a>
                        Dimensi & Berat
                    </a>
                </li>
                <li class="button">
                    <a>
                        Kapasitas
                    </a>
                </li>
                <li class="button">
                    <a>
                        Kelistrikan
                    </a>
                </li>
            </ul>
        </nav>

        <div class="bg-light shadow-sm px-5 py-3">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rem aspernatur, commodi nostrum tempore ipsum
            vitae doloribus asperiores quia impedit iusto vero inventore dolore labore nulla ducimus eius nobis,
            facilis perspiciatis.
        </div>

    </div>
</main>

<div class="honda__wrapper honda__bg">
    <button class="btn btn-honda dark_honda icon mx-2">
        <svg role="img" xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 384 512">
            <path fill="currentColor"
                d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z">
            </path>
        </svg>
        Dealer
    </button>
    <button class="btn btn-honda dark_honda icon mx-2">
        <svg ] role="img" xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 384 512">
            <path fill="currentColor"
                d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM192 40c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm121.2 231.8l-143 141.8c-4.7 4.7-12.3 4.6-17-.1l-82.6-83.3c-4.7-4.7-4.6-12.3.1-17L99.1 285c4.7-4.7 12.3-4.6 17 .1l46 46.4 106-105.2c4.7-4.7 12.3-4.6 17 .1l28.2 28.4c4.7 4.8 4.6 12.3-.1 17z">
            </path>
        </svg>
        Cek Ketersediaan
    </button>
    <button class="btn btn-honda dark_honda icon mx-2">
        <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" height="24" width="24">
            <path fill="currentColor"
                d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zm-132.9 88.7L299.3 420.7c-6.2 6.2-16.4 6.2-22.6 0L171.3 315.3c-10.1-10.1-2.9-27.3 11.3-27.3H248V176c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v112h65.4c14.2 0 21.4 17.2 11.3 27.3z">
            </path>
        </svg>
        Unduh Brosur
    </button>
    <button class="btn btn-honda dark_honda icon mx-2">
        <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="24" width="24">
            <path fill="currentColor"
                d="M512 256c0-37.7-23.7-69.9-57.1-82.4 14.7-32.4 8.8-71.9-17.9-98.6-26.7-26.7-66.2-32.6-98.6-17.9C325.9 23.7 293.7 0 256 0s-69.9 23.7-82.4 57.1c-32.4-14.7-72-8.8-98.6 17.9-26.7 26.7-32.6 66.2-17.9 98.6C23.7 186.1 0 218.3 0 256s23.7 69.9 57.1 82.4c-14.7 32.4-8.8 72 17.9 98.6 26.6 26.6 66.1 32.7 98.6 17.9 12.5 33.3 44.7 57.1 82.4 57.1s69.9-23.7 82.4-57.1c32.6 14.8 72 8.7 98.6-17.9 26.7-26.7 32.6-66.2 17.9-98.6 33.4-12.5 57.1-44.7 57.1-82.4zm-320-96c17.67 0 32 14.33 32 32s-14.33 32-32 32-32-14.33-32-32 14.33-32 32-32zm12.28 181.65c-6.25 6.25-16.38 6.25-22.63 0l-11.31-11.31c-6.25-6.25-6.25-16.38 0-22.63l137.37-137.37c6.25-6.25 16.38-6.25 22.63 0l11.31 11.31c6.25 6.25 6.25 16.38 0 22.63L204.28 341.65zM320 352c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"
                class=""></path>
        </svg>
        Lihat Promo
    </button>
</div>
@endsection