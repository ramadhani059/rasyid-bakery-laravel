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
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">Edit</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <form action="{{ route('product.update', ['product' =>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Edit Product</h3>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-sm btn-warning">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="productname">Product Name</label>
                                            <input type="text" id="productname" class="form-control @error('productname') is-invalid @enderror" name="productname" value="{{ $product->nama_product }}" placeholder="Enter Product Name">
                                            @error('productname')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="productprice">Price</label>
                                            <input type="text" id="productprice" class="form-control @error('productprice') is-invalid @enderror" name="productprice" value="{{ $product->harga_product }}" placeholder="Enter Product Price">
                                            @error('productprice')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="categoryproduct">Category</label>
                                            <select name="categoryproduct" class="form-control @error('categoryproduct') is-invalid @enderror" id="categoryproduct">
                                                <option value="" class="options">-- Category Product --</option>
                                                @foreach ($categorie as $kategori)
                                                    <option value="{{ $kategori->id}}" {{ $product->categorie->id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('categoryproduct')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="productphoto">Change Photo Product</label>
                                            <div class="value">
                                                <div class="input-group js-input-file">
                                                    <input class="input-file" type="file" name="productphoto" id="productphoto">
                                                    <label class="label--file mt-1 mr-3" for="productphoto">Choose file</label>
                                                    <span class="input-file__info mt-beda">{{$product->img_product_original}}</span>
                                                </div>
                                                <div>
                                                    @error('productphoto')
                                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
@endsection
