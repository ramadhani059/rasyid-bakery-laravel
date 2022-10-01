@extends('layout/app')

@section('content')
    <section class="home bg-white" id="home">
        <div
        class="container-fluid"
        style="background-color: #c97f42; padding-top: 150px; padding-bottom: 90px"
        >
            <div class="container container-satu">
                <div class="row align-items-center align-content-center">
                    <div class="col-md order-md-2">
                        <div class="card ml-auto" style="width: 18rem">
                            <img
                                src="{{ asset('img/product/img-container-1.png') }}"
                                class="card-img-top"
                                alt="..."
                            />
                            <div class="card-body">
                                <h3 class="card-title text-center fw-bold mt--1">Bear Macaron</h3>
                                <h4 class="text-center mb-2 mt--3" style="color: #adadad">Rp 7000</h4>
                                <p class="mb-0 fw-bold">Delivery Info</p>
                                <p style="color: #adadad">
                                    Some quick example text to build on the card title and make up
                                    the bulk of the card's content.
                                </p>
                                <div class="d-grid gap-2">
                                    <a href="{{route('produk')}}" class="d-grid gap-2"><button
                                        class="btn"
                                        type="button"
                                        style="color: white; background-color: #c97f42"
                                    >
                                        Go to Catalog
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md order-md-1" style="color: white">
                        <div class="row mb-3 mt-5">
                            <h1 style="font-weight: bolder; font-size: 48px; color: white;">
                                Yummy Food <br />For Busy People
                            </h1>
                        </div>
                        <div class="row mb-5">
                            <p class="fs-6 fw-light">
                                Eat the food you dream about at affordable prices.<br />
                                No need to come to us just call us
                            </p>
                        </div>
                        <div class="row">
                            <a href="{{route('produk')}}" style="width: 260px"
                                ><div class="button1 mb-5">
                                <div class="button1-left" style="float: left">
                                    Explore Menu
                                </div>
                                <div class="button1-right">
                                    <img src="{{ asset('img/icons/next.png') }}" alt="" />
                                </div></div
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
        class="container-fluid container container-satu"
        style="margin-top: 110px; margin-bottom: 110px"
        >
            <div class="row justify-content-center p-4">
                <div class="col-md mb-5">
                <img class="img-koki" src="{{asset('img/home/img-container-2.png')}}" alt="" />
                </div>
                <div class="col-md">
                <div class="row">
                    <h2 class="fw-bold" style="font-size: 40px; color: #702b02">
                    Explore The Best Food by Categories.
                    </h2>
                </div>
                <div class="row">
                    <p style="color: #adadad; font-size: 14px; font-weight: 500">
                    Eat the food you dream about at affordable prices. need to comes to us just call us. Explore The Best Foods by
                    Categories
                    </p>
                </div>
                <div class="row mb-4">
                    <div class="container2-img">
                    <img
                        class="mb-3"
                        src="{{asset('img/home/img-container-2-vanilla-macarons.png')}}"
                        alt=""
                    />
                    <h4 class="fw-bold">Macarons</h4>
                    </div>
                    <div class="container2-img">
                    <img
                        class="mb-3"
                        src="{{asset('img/home/img-container-2-roti-sobek.png')}}"
                        alt=""
                    />
                    <h4 class="fw-bold">Roti</h4>
                    </div>
                    <div class="container2-img">
                    <img
                        class="mb-3"
                        src="{{asset('img/home/img-container-2-brownies-oreo.png')}}"
                        alt=""
                    />
                    <h4 class="fw-bold">Brownies</h4>
                    </div>
                </div>
                <div class="row">
                    <a
                    href="{{route('produk')}}"
                    class="ml-auto"
                    style="text-decoration: none;"
                    ><div class="container-btn-2">Show more</div></a
                    >
                </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin: 150px auto">
            <div class="my-5"
                style="background-image: url('{{ asset('img/home/img-container-3.png') }}');
                    color: white;
                    background-size: cover;
                    border-radius: 10px;
                    width: 97%;
                    margin: auto;
                    text-align: center;
                    padding: 80px 0;">
                <h2 style="color: white; font-size: 25pt;">
                    Get up to 50% off when<br />
                    You buy more than 10 items
                </h2>
                <p>
                    Eat the food ou dream about at affroddable prices. No need to come to
                <br />
                    us just call us. Explore The Best Foods by Categories
                </p>
                <a href="{{route('produk')}}" style="text-decoration: none; width: 140px;">
                    <div style="padding: 10px; background-color: #e18e4a; width: 120px; color: white; margin: auto; border-radius: 5px;">Buy Now</div>
                </a>
            </div>
        </div>
    </section>
@endsection
