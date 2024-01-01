@extends('layouts.default')

@section('title', 'Category')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Books</h1>

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
                                <form class="form form-horizontal" action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-body">
                                        <div class="form-section">
                                            <p>Please complete the input <code>required</code>, before you click the submit
                                                button.</p>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="title">Title <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="title" name="title" class="form-control" placeholder="example Senja dan Pagi" value="{{ old('title') }}" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="description">Description <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <textarea type="text" id="description" name="description" class="form-control" placeholder="example : this book is desc..." value="{{ old('description') }}" autocomplete="off" required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="category_id">Category <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="stock">Stock <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="stock" name="stock" class="form-control" placeholder="example 100" value="{{ old('stock') }}" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="file_path">File <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" id="file_path" name="file_path" class="form-control" placeholder="example 100" value="{{ old('file_path') }}" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="image_path">image <code style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" id="image_path" name="image_path" class="form-control" placeholder="example 100" value="{{ old('image') }}" autocomplete="off" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" style="width:120px;" class="btn btn-primary" onclick="return confirm('Are you sure want to save this data ?')">
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

        {{-- Table Book --}}
        <div class="card shadow mb-4 mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('book.export') }}" class="btn btn-success mt-2 mb-2">
                        <i class="fas fa-file-excel"></i> Export
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="book-datatables" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Upload By</th>
                                <th>File</th>
                                <th>Cover</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Upload By</th>
                                <th>File</th>
                                <th>Cover</th>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    @include('pages.backsite.operational.book.datatables.init')
@endpush

@push('after-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
