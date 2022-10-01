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
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">Product</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('product.create' )}}" class="btn btn-sm btn-brown"><i class="fas fa-plus text-brown mr-2"></i>New</a>
              <a href="{{ route('product.exportPdf')}}" class="btn btn-sm btn-brown"><i class="fas fa-download text-brown mr-2"></i>Export PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Data Product </h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach ($product as $item)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-4">
                          <img alt="Image placeholder" src="{{ asset('storage/image/product/'.$item->img_product_encrypted) }}">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm">{{ $item->nama_product }}</span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                        Rp. {{ $item->harga_product }}
                    </td>
                    <td>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <i class="bg-warning"></i>
                            <span class="status">{{ $item->categorie->nama_kategori }}</span>
                        </span>
                    </td>
                    <td>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-icon-only text-light" data-toggle="tooltip" href="{{ route('product.show', ['product' => $item->id]) }}" role="button" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-icon-only text-light" data-toggle="tooltip" href="{{ route('product.edit', ['product' => $item->id]) }}" role="button" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('product.destroy', ['product' => $item->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-icon-only text-light btn-delete" data-name="{{ $item->nama_product }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection
