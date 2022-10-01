@extends('admin/layout/app')

@section('content')
<!-- Header -->
    <div class="header bg-brown pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-brown active"><a href="#"><i class="fas fa-home text-brown"></i></a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="{{ route('category.index') }}">Category</a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">Add</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Add Category</h3>
                        </div>
                        <div class="col-4 text-right">
                            <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="categoryname">Category Name</label>
                                        <input type="text" id="categoryname" class="form-control @error('categoryname') is-invalid @enderror" name="categoryname" value="{{ old('categoryname') }}" placeholder="Enter Category Name">
                                        @error('categoryname')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="slug">Keyword</label>
                                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="Enter Total Product">
                                        @error('slug')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="totalproduct">Total Product</label>
                                        <input type="text" id="totalproduct" class="form-control @error('totalproduct') is-invalid @enderror" name="totalproduct" value="{{ old('totalproduct') }}" placeholder="Enter Keyword Category">
                                        @error('totalproduct')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="categoryphoto">Add Photo Category</label>
                                        <div class="value">
                                            <div class="input-group js-input-file">
                                                <input class="input-file" type="file" name="categoryphoto" id="categoryphoto">
                                                <label class="label--file mt-1 mr-3" for="categoryphoto">Choose file</label>
                                                <span class="input-file__info mt-beda">No file chosen</span>
                                            </div>
                                            <div>
                                                @error('categoryphoto')
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
