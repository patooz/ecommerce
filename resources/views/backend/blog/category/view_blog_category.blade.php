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
                <h3 class="box-title">Total Blog Categories <span class="badge badge-pill badge-info">{{count($blogCategory)}}</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              
                              <th>Blog Category English</th>
                              <th>Blog Category Swahili</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($blogCategory as $item )


                          <tr>
                              
                              <td>{{$item->blog_category_name_eng}}</td>
                              <td>{{$item->blog_category_name_swa}}</td>

                              <td>
                                  <a href="{{ route('edit_blog_category',$item->id) }}" class="btn btn-info" title="Edit Blog Category" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete_blog_category',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Blog Category"
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

          {{-- Add Category --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Blog Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store_blog_category') }}" method="POST" >
                        @csrf


                                    <div class="form-group">
                                        <h5>Blog Category Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_eng" class="form-control">
                                            @error('blog_category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category Name in Swahili <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_swa" class="form-control">
                                            @error('blog_category_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                       <div class="text-xs-right">
                               <input type="submit" value="Add Blog Category" class="btn btn-rounded btn-primary mb-5" >
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
