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
                <h3 class="box-title">Subcounty List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>

                              <th>Subcounty Name</th>
                              <th>County</th>
                              <th style="width: 25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subcounty as $item )


                          <tr>

                              <td>{{$item->subcounty_name}}</td>
                              <td>{{$item->county->county_name}}</td>


                              <td>
                                  <a href="{{ route('edit.subcounty',$item->id) }}" class="btn btn-info" title="Edit County" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.subcounty',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Subcounty"
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
                 <h3 class="box-title">Add Subcounty</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.subcounty') }}" method="POST" >
                        @csrf


                        <div class="form-group">
                            <h5> Select County <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="county_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select County</option>
                                    @foreach ($counties as $item )


                                    <option value="{{$item->id}}">{{$item->county_name}}</option>
                                    @endforeach
                                </select>
                                @error('county_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>



                <div class="form-group">
                    <h5>Subcounty Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="subcounty_name" class="form-control">
                        @error('subcounty_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Add Subcounty" class="btn btn-rounded btn-primary mb-5" >
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
