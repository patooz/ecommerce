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
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>English</th>
                              <th>Kiswahili</th>
                              <th>Brand Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($brands as $item )


                          <tr>
                              <td>{{$item->brand_name_en}}</td>
                              <td>{{$item->brand_name_swa}}</td>
                              <td> <img src="{{asset($item->brand_image)}}" style="height: 90px; width: 120px;" >  </td>
                              <td>
                                  <a href="{{ route('edit.brand',$item->id) }}" class="btn btn-info" title="Edit Brand" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.brand',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Brand"
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

          {{-- Add Brand --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data" >
                        @csrf


                                    <div class="form-group">
                                        <h5>Brand Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control">
                                            @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name in Swahili <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_swa" class="form-control">
                                            @error('brand_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control">
                                            @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                         </div>

                                    </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Add Brand" class="btn btn-rounded btn-primary mb-5" >
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
