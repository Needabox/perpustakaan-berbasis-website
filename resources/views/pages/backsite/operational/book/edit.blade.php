@extends('layouts.default')

@section('title', 'Category')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Book</h1>

        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('book.update', [$book->id]) }}" method="POST"
                                    enctype="multipart/form-data">

                                    @method('PUT')
                                    @csrf

                                    <div class="form-body">
                                        <div class="form-section">
                                            <p>Please complete the input <code>required</code>, before you click the submit
                                                button.</p>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="title">Title <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="example Senja dan Pagi" value="{{ $book->title }}"
                                                    autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="description">Description <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <textarea type="text" id="description" name="description"
                                                    class="form-control" placeholder="example : this book is desc..."
                                                    autocomplete="off" required>{{ $book->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="category_id">Category <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <select name="category_id" id="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="stock">Stock <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="stock" name="stock" class="form-control"
                                                    placeholder="example 100" value="{{ $book->stock }}" autocomplete="off"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="file_path">File <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" id="file_path" name="file_path" class="form-control"
                                                    placeholder="{{ $book->file_path }}" value="{{ $book->file_path }}"
                                                    autocomplete="off" />
                                                <p>Current File :<a href="{{ asset('storage/file/'. $book->file_path) }}">{{ $book->file_path }}</a></p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="image_path">image <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" id="image_path" name="image_path" class="form-control" placeholder="example 100" value="{{ $book->image_path }}" autocomplete="off">
                                                <p>Current Cover :<a href="{{ asset('storage/cover/'. $book->image_path) }}">{{ $book->image_path }}</a></p>
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

    </div>
@endsection
