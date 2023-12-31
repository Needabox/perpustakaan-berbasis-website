@extends('layouts.default')

@section('title', 'Category')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category</h1>

        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
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
                                <form class="form form-horizontal" action="{{ route('category.store') }}" method="POST"
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
                                                    placeholder="example Fiksi or Non Fiksi"
                                                    value="{{ old('name') }}" autocomplete="off" required>
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

        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="category-datatables" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        {{-- <tbody>
                            @foreach ($category as $category_item)
                                <tr>
                                    <td>{{ $category_item->name }}</td>
                                    <td>{{ $category_item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category_item->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('category.destroy', $category_item->id) }}"
                                            method="POST" class="d-inline"
                                            onclick="return confirm('Are you sure want to delete this data ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                </tr>
                            @endforeach
                        </tbody> --}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    @include('pages.backsite.operational.category.datatables.init')
@endpush

@push('after-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush