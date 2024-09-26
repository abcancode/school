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
                <h3 class="box-title">Students Fee Amount List</h3>
                <a href="{{ route('student.fee_amount.create')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%" >SN</th>                              
                              <th>Fee Category</th>                             
                              <th width="30%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $amount)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $amount['fee_category']['name'] }}</td>
                            <td>
                                <a href="{{route('edit.student.fee_amount', $amount->fee_category_id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('details.student.fee_amount', $amount->fee_category_id)}}" class="btn btn-success">Details</a>                                
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