@extends('admin/layout/app')

@section('content')
<!-- Header -->
    <div class="header bg-brown pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Message</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-brown active"><a href="#"><i class="fas fa-home text-brown"></i></a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="{{ route('message.index') }}">Message</a></li>
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
                                <h3 class="mb-0">Category Detail</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row align-items-center align-content-center mt-4">
                                    <div class="col-sm-2">
                                        <label class="form-control-label-subject">Name</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="form-control-label-message">{{ $pesan->name }}</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="form-control-label-subject">Email</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="form-control-label-message">{{ $pesan->email }}</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label class="form-control-label-subject">Subject</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="form-control-label-message">{{ $pesan->subject }}</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row align-items-center align-content-center mb-4">
                                    <div class="col-sm-2">
                                        <label class="form-control-label-subject">Message</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <label class="form-control-label-message">{{ $pesan->message }}</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
