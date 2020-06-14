@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Members</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Members</li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="card-title">All members</h3>
                            </div>
                            <div class="col-6">
                                <a type="button" class="btn btn-primary float-right" href="{{ route('members.create') }}">Create a new member</a>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if ($user->id != Auth::user()->id)
                                <tr>
                                    <td class="align-middle">{{$number++}}</td>
                                    <td class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" style="width: 70px; height: 70px;" src="/images/avatar/{{ $user->avatar }}" alt="User profile picture">
                                    </td>
                                    <td class="align-middle">{{$user->name}}</td>
                                    <td class="align-middle">{{$user->email}}</td>
                                    <td class="align-middle">{{$user->department}}</td>
                                    <td class="align-middle">{{$user->role}}</td>
                                    <td class="project-actions text-center align-middle">
                                        <a class="btn btn-primary btn-sm" href="{{ route('members.show',$user->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            <!-- View -->
                                        </a>
                                        <a class="btn btn-info btn-sm ml-3 mr-3" href="{{ route('members.edit',$user->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            <!-- Edit -->
                                        </a>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default">
                                            <i class="fas fa-trash">
                                            </i>
                                            <!-- Delete -->
                                        </a>
                                        
                                    </td>
                                    <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                                <form action="{{ route('members.destroy',$user->id) }}" method="POST" id="deleteCourseForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-content">
                                                        <div class="modal-header justify-content-center">
                                                            <h4 class="modal-title align-self-center">Delete member</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <h5>Do you want to delete this member ?</h5>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </form>
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

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
    $(document).ready(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthMenu": [
                [3, 5, 10, -1],
                [3, 5, 10, "All"]
            ],
        });

        
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        //   "responsive": true,
        // });
    });
</script>
@endsection