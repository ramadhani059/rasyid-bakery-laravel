@extends('admin/layout/app')

@section('content')
<!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 400px; background-color: #C97F42; background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-brown"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="{{ asset('img/profile/Profile.png') }}" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    @if ( Auth::user()->img_user_encrypted != null)
                        <img src="{{ asset('storage/image/user/'.Auth::user()->img_user_encrypted) }}" class="rounded-circle">
                    @else
                        <img src="{{ asset('img/profile/akun_kosong.png') }}" class="rounded-circle">
                    @endif
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-warning  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-warning float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-2">
              <div class="text-center">
                <h5 class="h3 mt-2">
                  {{ Auth::user()->name }}
                </h5>
                <div class="h5 font-weight-300">
                  <i class="mr-2 mt-2"></i>{{ Auth::user()->email }}
                </div>
                <div class="h4 mt-2">
                  <i class="mr-2"></i>{{ Auth::user()->position }}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
        <form action="{{ route('profile.update', ['profile' =>Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Profile</h3>
                </div>
                <div class="col-4 text-right">
                  <button type="submit" class="btn btn-sm btn-warning">Save</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="username">Username</label>
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" placeholder="Enter Your Username">
                        @error('username')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Email Address</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Your Email">
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
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" placeholder="Enter Your Name">
                        @error('name')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="position">Position</label>
                        <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ Auth::user()->position }}" placeholder="Enter Your Positon">
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
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ Auth::user()->password }}" placeholder="Enter Your Password">
                        @error('password')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="photoprofile">Change Photo Profile</label>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="photoprofile" id="photoprofile">
                                    <label class="label--file mt-1 mr-3" for="photoprofile">Choose file</label>
                                    <span class="input-file__info mt-beda">{{ Auth::user()->img_user_original }}</span>
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
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
