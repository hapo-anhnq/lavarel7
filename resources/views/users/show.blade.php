@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>My profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline " style="height: 390px;">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/images/avatar/{{ Auth::user()->avatar }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->role }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <a href="#"><b>Projects</b></a> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"><b>Tasks</b></a> <a class="float-right">543</a>
                            </li>
                        </ul>

                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-block"><b>Account Setting</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-primary card-outline" style="height: 390px;">
                    <div class="card-body">
                        <div class="row">
                            <label for="inputName" class="col-sm-3 ">Name</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <hr class="my-2">


                        <div class="row">
                            <label for="inputEmail" class="col-sm-3">Email</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">{{ Auth::user()->email }}
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <label for="inputEmail" class="col-sm-3">Gender</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">{{ Auth::user()->gender }}
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <hr class="my-1">
                            <label for="inputName2" class="col-sm-3">Department</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">{{ Auth::user()->department }}
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <label for="inputName2" class="col-sm-3">Birthday</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">
                                {{ Auth::user()->birthday }}
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <label for="inputName2" class="col-sm-3">Phone Number</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">{{ Auth::user()->phone_number }}
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <label for="inputSkills" class="col-sm-3">Role</label>
                            <div class="col-sm-1">
                                <!-- : -->
                            </div>
                            <div class="col-sm-8">{{ Auth::user()->role }}
                            </div>
                        </div>
                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </div>
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
            format: 'L'
        })
    });
</script>
@endsection
