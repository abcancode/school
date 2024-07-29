@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
    
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Users Comprehensive List</h3>
                <a href="{{ route('user.create')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-user-plus" aria-hidden="true"></i> Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%" >SN</th>
                              <th>Role</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th width="25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user -> role }}</td>
                            <td>{{ $user -> name }}</td>
                            <td>{{ $user -> email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{ route('users.delete', $user->id)}}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>     
                        @endforeach                                               
                      </tbody>
                      <tfoot>

                      </tfoot>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection