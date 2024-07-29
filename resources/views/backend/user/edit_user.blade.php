@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Update User</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('users.update', $editData->id) }}">
                                    @csrf

                                    <div class="row">

                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>User Role</h5>
                                                        <div class="controls">
                                                            <select name="role" id="select" required
                                                                class="form-control">
                                                                <option value="" selected disabled>Select Your
                                                                    Role</option>
                                                                <option value="Admin" {{ $editData->role == "Admin" ? "selected" : "" }} >Admin</option>
                                                                <option value="User" {{ $editData->role == "User" ? "selected" : "" }}>User</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>User Name</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12">

                                            <div class="row">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <h5>User Email </span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" value="{{ $editData->email }}" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                             </div>

                                        </div>





                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                        </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
@endsection
