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
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">User</a></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{ route('user.create') }}" class="btn btn-sm btn-brown"><i class="fas fa-plus text-brown mr-2"></i>New</a>
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
              <h3 class="mb-0">Data User</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  @foreach ($user as $user)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-4">
                            @if ( $user->img_user_original != null)
                                <img alt="Image placeholder" src="{{ asset('storage/image/user/'.$user->img_user_encrypted) }}">
                            @else
                                <img alt="Image placeholder" src="{{ asset('img/profile/akun_kosong.png') }}">
                            @endif
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo \Illuminate\Support\Str::limit(strip_tags( $user->name ), 25, $end='...') ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                        <?php echo \Illuminate\Support\Str::limit(strip_tags( $user->email ), 20, $end='...') ?>
                    </td>
                    <td>
                        <span class="badge badge-dot mr-4">
                            <i class="bg-warning"></i>
                            <span class="status">{{ $user->position }}</span>
                        </span>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-icon-only text-light" href="{{ route('user.show', ['user' => $user->id]) }}" role="button" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-sm btn-icon-only text-light" href="{{ route('user.edit', ['user' => $user->id]) }}" role="button" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('user.destroy', ['user' => $user->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-icon-only text-light btn-delete" data-name="{{ $user->name }}"><i class="fas fa-trash"></i></button>
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
