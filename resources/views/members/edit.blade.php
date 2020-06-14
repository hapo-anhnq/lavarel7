@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit {{ $user->name }}'s profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/members') }}">Members</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-6"> -->
        <div class="card card-primary card-outline">
            <div class="card-body w-100 box-profile">
                <form class="form-horizontal" method="post" action="{{ route('members.update', $user->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="row ">
                        <div class="col-md-6 d-block justify-content-between">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="col-sm-4">
                                    <img class="profile-user-img img-fluid img-circle mr-2" src="/images/avatar/{{ $user->avatar }}">
                                </div>
                                <div class="col-sm-8">
                                    <h4>{{ $user->name }}'s Profile</h4>
                                    <label class="w-100" for="avatar">Update Profile Image</label>
                                    <input type="file" name="avatar">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}">
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
                        </div>
                        <!-- </div> -->
                        <!-- </div> -->
                        <div class="col-md-6">
                            <!-- <div class="card card-primary card-outline" style="height: 400px;"> -->
                            <!-- <div class="card-body"> -->
                            <div class="form-group row">
                                <label for="selectGender" class="col-sm-4 col-form-label">Gender</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="selectGender" name="gender" value="{{ $user->gender }}">
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender }}" {{ ($gender == $user->gender) ? 'selected' : '' }}>{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDepartment" class="col-sm-4 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputDepartment" name="department" value="{{ $user->department }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="reservationdate" class="col-sm-4 col-form-label">Birthday</label>
                                <div class="col-sm-8">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datepicker-here" id="birthday" name="birthday" data-target="#reservationdate" value="{{ $user->birthday }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhoneNum" class="col-sm-4 col-form-label">Phone Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPhoneNum" name="phone_number" value="{{ $user->phone_number }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selectRole" class="col-sm-4 col-form-label">Role</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" id="selectRole" name="role" value="{{ $user->role }}">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ ($role == $user->role) ? 'selected' : '' }}>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </div>
</section>
<!-- /.content -->

@endsection

@section('scripts')
<script>
    $(function() {
        $('#reservationdate').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'YYYY-MM-DD',
        });
    });
</script>
@endsection
