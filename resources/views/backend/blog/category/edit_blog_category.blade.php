@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          

          <!-- edit blog category -->
          <div class="col-8">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Blog Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update_blog_category',$blogCategory->id) }}" method="POST" >
                        @csrf


                                    <div class="form-group">
                                        <h5>Blog Category Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_eng" class="form-control" value="{{$blogCategory->blog_category_name_eng}}">
                                            @error('blog_category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category Name in Swahili <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_swa" class="form-control" value="{{$blogCategory->blog_category_name_swa}}">
                                            @error('blog_category_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                       <div class="text-xs-right">
                               <input type="submit" value="Update Blog Category" class="btn btn-rounded btn-primary mb-5" >
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
