@extends('layout/app')

@section('title')
    <title>Product | Rasyid Bakery</title>
@endsection

@section('css-custom')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" type="text/css">
@endsection

@section('content')
    <section class="home bg-white" id="contact">
        <div class="container-lg">
            <div class="row min-vh-10 align-items-center align-content-center">
            </div>
            <div class="row py-5">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget mercado-widget categories-widget" style="margin-top: 33px;">
                        <h2 class="widget-title">All Categories</h2>
                        <div class="widget-content">
                            <ul class="list-category">
                                @foreach ( $categories as $kategori)
                                    <li class="category-item has-child-cate">
                                        <a href="{{route('product.category',['category_slug'=>$kategori->slug])}}" class="cate-link">{{ $kategori->nama_kategori }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-shop-control" style="background: #c97f42">
                        <h1 class="shop-title text-white">{{$category_name}}</h1>
                    </div>
                    <!--end wrap shop control-->

                    <div class="row">
                        <ul class="product-list grid-products equal-container">
                            @foreach ($product as $item)
                                <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
                                    <div class="product product-style-3 equal-elem">
                                        <div class="product-thumnail">
                                            <a href="#">
                                                <figure><img alt="Image placeholder" src="{{ asset('storage/image/product/'.$item->img_product_encrypted) }}"></figure>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-name"  align="justify"><h4 class="text-dark-brown">{{ $item->nama_product }}</h4></a>
                                            <div class="wrap-price"><h5 class="text-dark-brown">Rp. {{ $item->harga_product }}</h5></div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="wrap-pagination-info"></div>
                </div>


            </div>
        </div>
    </section>
@endsection
