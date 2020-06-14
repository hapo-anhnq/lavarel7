@extends('layouts.profile.edit')

@section('form')

<form class="form-horizontal" enctype="multipart/form-data"  method="post" action="{{ route('users.update', $user->id) }}">
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
    <div class="row justify-content-center mb-4">
        <div class="col-sm-2">
            <img class="profile-user-img img-fluid img-circle mr-2" src="/images/avatar/{{ $user->avatar }}">
        </div>
        <div class="col-sm-auto">
            <h2>{{ $user->name }}'s Profile</h2>
            <label class="w-100" for="avatar">Update Profile Image</label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $user->email }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="selectGender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-10">
            <select class="form-control select2" id="selectGender" name="gender" value="{{ $user->gender }}">
                @foreach ($genders as $gender)
                <option value="{{ $gender }}" {{ ($gender == $user->gender) ? 'selected' : '' }}>{{ $gender }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputDepartment" class="col-sm-2 col-form-label">Department</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputDepartment" name="department" value="{{ $user->department }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="reservationdate" class="col-sm-2 col-form-label">Birthday</label>
        <div class="col-sm-10">
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" class="form-control datepicker-here" id="birthday" name="birthday" data-target="#reservationdate" value="{{ $user->birthday }}" />
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPhoneNum" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPhoneNum" name="phone_number" value="{{ $user->phone_number }}">
        </div>
    </div>
    <div class="form-group row">
        <label for="selectRole" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select class="form-control select2" id="selectRole" name="role" value="{{ $user->role }}">
                @foreach ($roles as $role)
                <option value="{{ $role }}" {{ ($role == $user->role) ? 'selected' : '' }}>{{ $role }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(function() {

        $('#reservationdate').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'YYYY-MM-DD',
            // format: 'L'
        });
    });
</script>
@endsection