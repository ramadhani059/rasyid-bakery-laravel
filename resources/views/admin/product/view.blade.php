@extends('admin/layout/app')

@section('content')
<!-- Header -->
    <div class="header bg-brown pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-brown active"><a href="#"><i class="fas fa-home text-brown"></i></a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="{{ route('product.index') }}">Product</a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">View</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Product Detail</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row align-items-center align-content-center mt-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="product-image" style="" >
                                                <a href="#" class="photo-detail rounded-circle" >
                                                    <img alt="Image placeholder" src="{{ asset('storage/image/product/'.$product->img_product_encrypted) }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-control-label-product">{{ $product->nama_product }}</label>
                                            <br>
                                            <label class="form-control-label-kategori">{{ $product->categorie->nama_kategori }}</label>
                                            <br>
                                            <label class="form-control-label-harga">Rp. {{ $product->harga_product }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
