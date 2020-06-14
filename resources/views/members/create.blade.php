@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Creating a member</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/members') }}">Members</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="{{ route('members.store') }}" enctype="multipart/form-data">
                            @csrf

                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                            @endforeach

                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-9">
                                    <div class="form-group d-flex">
                                        <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputName" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="inputEmail" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="inputEmail" class="col-sm-4 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="inputPassword" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <label for="inputPassConfirm" class="col-sm-4 col-form-label">Confirm password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="inputPassConfirm" name="password_confirm">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex mt-4">
                                        <div class="col-sm-2">
                                            <a data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
                                                Advanced
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-9">
                                    <div id="test-block" class="collapse">
                                        <div class="card-block">
                                            <div class="d-flex mb-4">
                                                <div class="col-sm-4">
                                                <label class="w-100" for="avatar">Update Profile Image</label>
                                                </div>
                                                <div class="col-sm-auto">
                                                    
                                                    <input type="file" name="avatar">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                </div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <label for="selectGender" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" id="selectGender" name="gender">
                                                        <option value=" male">male</option>
                                                        <option value="female">female</option>
                                                        <option value="other">other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <label for="inputDepartment" class="col-sm-4 col-form-label">Department</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="inputDepartment" name="department">
                                                </div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <label for="reservationdate" class="col-sm-4 col-form-label">Birthday</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                        <input type="text" class="form-control datepicker-here" id="birthday" name="birthday" data-target="#reservationdate" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex">
                                                <label for="inputPhoneNum" class="col-sm-4 col-form-label">Phone Number</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="inputPhoneNum" name="phone_number">
                                                </div>
                                            </div>
                                            <div class=" form-group d-flex">
                                                <label for="selectRole" class="col-sm-4 col-form-label">Role</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control select2" id="selectRole" name="role">
                                                        <option value="admin">admin</option>
                                                        <option value="member" selected="selected">member</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-9 d-flex mt-4">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                            <!-- </div> -->
                        </form>


                        <!-- <div class="card">
                            <div class="card-header">
                                <a data-toggle="collapse" href="#test-block" aria-expanded="true" aria-controls="test-block">
                                    card header
                                </a>
                            </div>
                            <div id="test-block" class="collapse">
                                <div class="card-block">
                                    card block
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('scripts')
<script>
    $(function() {});
</script>
@endsection