@extends('layouts.default')

@section('title', 'Category')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('user.update', [$user->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
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
                                                    placeholder="example Tono or Hani" value="{{ $user->name }}"
                                                    autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="enail">Email <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="example tono@mail.com" value="{{ $user->email }}"
                                                    autocomplete="off" required disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="user_type">User Type <code
                                                    style="color:red;">required</code></label>
                                            <div class="col-md-9 mx-auto">
                                                <select name="user_type" id="user_type" class="form-control" required>
                                                    <option value="">-- Select User Type --</option>
                                                    <option value="1" {{ $user->user_type == '1' ? 'selected' : '' }}>Admin</option>
                                                    <option value="2" {{ $user->user_type == '2' ? 'selected' : '' }}>User</option>
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

    </div>
@endsection
