@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">County List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>

                              <th>County Name</th>
                              <th style="width: 25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($county as $item )


                          <tr>

                              <td>{{$item->county_name}}</td>


                              <td>
                                  <a href="{{ route('edit.county',$item->id) }}" class="btn btn-info" title="Edit County" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.county',$item->id) }}" id="delete" class="btn btn-danger" title="Delete County"
                                    ><i class="fa fa-trash" ></i></a>
                              </td>

                          </tr>
                          @endforeach

                      </tbody>

                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <!-- /.col -->

          {{-- Add County --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add County</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.county') }}" method="POST" >
                        @csrf


                <div class="form-group">
                    <h5>County Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="county_name" class="form-control">
                        @error('county_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Add County" class="btn btn-rounded btn-primary mb-5" >
                           </div>
                       </form>


                   </div>
               </div>
               <!-- /.box-body -->
             </div>

           </div>
           <!-- /.col -->






        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
