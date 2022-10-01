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
                  <li class="breadcrumb-item text-brown active"><a class="text-brown active" href="#">Message</a></li>
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
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Data Massage</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush datatable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Massage</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                    @foreach ($message as $pesan)
                  <tr>
                    <th scope="row">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?php echo \Illuminate\Support\Str::limit(strip_tags($pesan->name), 20, $end='...') ?></span>
                        </div>
                    </th>
                    <td class="budget">
                        <?php echo \Illuminate\Support\Str::limit(strip_tags($pesan->email), 15, $end='...') ?>
                    </td>
                    <td class="budget">
                        <?php echo \Illuminate\Support\Str::limit(strip_tags($pesan->subject), 15, $end='...') ?>
                    </td>
                    <td class="budget">
                        <?php echo \Illuminate\Support\Str::limit(strip_tags($pesan->message), 25, $end='...') ?>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-icon-only text-light" href="{{ route('message.show', ['message' => $pesan->id]) }}" role="button" data-toggle="tooltip" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('message.destroy', ['message' => $pesan->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-icon-only text-light btn-delete" data-name="{{ $pesan->subject }}"><i class="fas fa-trash"></i></button>
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
