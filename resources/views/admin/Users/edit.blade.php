@extends('admin.shared.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Add</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">General</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $users->name }}" />
                                    @if ($errors->has('name'))
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ $users->email }}" />
                                    @if ($errors->has('email'))
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Nobile No.</label>
                                    <input type="text" id="mobile" name="mobile" class="form-control"
                                        value="{{ $users->mobile }}" />
                                    @if ($errors->has('mobile'))
                                        <div class="error">{{ $errors->first('mobile') }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control custom-select" name="gender" id="gender">
                                        <option selected disabled>Select one</option>
                                        <option value="Male" {{ $users->gender == 'Male' ? 'selected="selected"' : '' }}>
                                            Male
                                        </option>
                                        <option value="Female"
                                            {{ $users->gender == 'Female' ? 'selected="selected"' : '' }}>
                                            Female</option>
                                        <option value="Other"
                                            {{ $users->gender == 'Other' ? 'selected="selected"' : '' }}>
                                            Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_role">Role</label>
                                    <select class="form-control custom-select" name="user_role" id="user_role">
                                        <option selected disabled>Select one</option>
                                        <option value="1" {{ $users->user_role == '1' ? 'selected="selected"' : '' }}>
                                            Admin</option>
                                        <option value="2" {{ $users->user_role == '2' ? 'selected="selected"' : '' }}>Sub
                                            Admin
                                        </option>
                                        <option value="3" {{ $users->user_role == '3' ? 'selected="selected"' : '' }}>
                                            Manager
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
