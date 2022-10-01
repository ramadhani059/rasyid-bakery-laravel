@extends('admin/layout/app')

@section('content')
<!-- Header -->
    <div class="header bg-brown pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">User</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-brown active"><a href="#"><i class="fas fa-home text-brown"></i></a></li>
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="{{ route('user.index') }}">User</a></li>
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
    <form action="{{ route('user.update', ['user' =>$user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit User</h3>
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
                                        <label class="form-control-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" placeholder="Enter Your Username">
                                        @error('username')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email Address</label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Enter Your Email">
                                        @error('email')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Full Name</label>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Enter Your Name">
                                        @error('name')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="position">Position</label>
                                        <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $user->position }}" placeholder="Enter Your Positon">
                                        @error('position')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $user->password }}" placeholder="Enter Your Password">
                                        @error('password')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="photoprofile">Add Photo Profile</label>
                                        <div class="value">
                                            <div class="input-group js-input-file">
                                                <input class="input-file" type="file" name="photoprofile" id="photoprofile">
                                                <label class="label--file mt-1 mr-3" for="photoprofile">Choose file</label>
                                                <span class="input-file__info mt-beda">{{ $user->img_user_original }}</span>
                                            </div>
                                            <div>
                                                @error('photoprofile')
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
