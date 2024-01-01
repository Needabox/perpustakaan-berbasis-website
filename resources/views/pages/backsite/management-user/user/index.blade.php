@extends('layouts.default')

@section('title', 'Category')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>

        {{-- error --}}
        @if ($errors->any())
            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <ul class="text-white">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add Data --}}
        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div
                                class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                                <a class="d-flex align-items-center" data-action="collapse">
                                    <span class="fs-1 text-white">Add Data</span>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="fas fa-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('user.store') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-body">
                                        <div class="form-section">
                                            <p>Please complete the input <code>required</code>, before you click the submit
                                                button.</p>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="name">Name <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="example Tono or Hani" value="{{ old('name') }}"
                                                    autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="enail">Email <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="example tono@mail.com" value="{{ old('email') }}"
                                                    autocomplete="off" required>
                                                    @if ($errors->has('email'))
                                                        <p style="font-style: bold; color: red;">{{ $errors->first('email') }}</p>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="user_type">User Type <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <select name="user_type" id="user_type" class="form-control" required>
                                                    <option value="">Select User Type</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" style="width:120px;" class="btn btn-primary"
                                            onclick="return confirm('Are you sure want to save this data ?')">
                                            <i class="la la-check-square-o"></i> Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        {{-- Table Users --}}
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="user-datatables" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Type</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    @include('pages.backsite.management-user.user.datatables.init')
@endpush

@push('after-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
