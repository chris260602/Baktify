@extends('layouts/app')

@section('title', 'Home')

@section('content')
    <section class="mx-5 px-5">
        {{-- {{ dd(auth()->user()) }} --}}
        <section class="p-5 d-flex flex-column align-items-center">
            <div class="pt-3 pb-5 d-flex justify-content-center">
                <h1 class="w-75 fw-bold text-center">Level Up Your Music Collection</h1>
            </div>
            <div class="my-5 d-flex justify-content-center shadow-sm">
                <img class="w-75" src="/images/home-albums.png" alt="home-albums" />
            </div>
            <div class="d-flex flex-column align-items-center">
                <h2 class="fw-bold">One-stop store for all of your musical enthusiasm needs</h2>
                <p class="text-secondary">We provide wide variety of music genre and album</p>
            </div>
        </section>
        <section class="p-5 d-flex flex-row-reverse">
            <div>
                <img class="w-100" src="/images/home-shield.png" alt="Secure">
            </div>
            <div class="pe-5 d-flex flex-column justify-content-center">
                <h3 class="fw-bold">Highly Secure Transaction</h3>
                <p>We are proud to offer fast and professional delivery services with all major payment methods available
                    through our online shop. Additionally, if you require some flexibility regarding payment, we provide
                    finance options so you can pay in instalments.</p>
            </div>
        </section>
        <section class="p-5 d-flex flex-row">
            <div>
                <img class="w-100" src="images/home-bulk.png" alt="Bulk">
            </div>
            <div class="ps-5 d-flex flex-column justify-content-center">
                <h3 class="fw-bold">Bulk Ordering Makes it Possible</h3>
                <p>Through the large purchasing volumes, DV and Music Store are able to source containers directly from
                    manufacturers worldwide allowing us to offer a large range of products at sensationally low prices.</p>
            </div>
        </section>
    </section>
@endsection
