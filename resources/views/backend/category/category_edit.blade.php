@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">




          {{-- Add Category --}}
          <div class="col-10">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.category',$category->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">


                                    <div class="form-group">
                                        <h5>Category Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                                            @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Category Name in Swahili <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_swa" class="form-control" value="{{ $category->category_name_swa }}" >
                                            @error('category_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Category Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                            @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>






                           <div class="text-xs-right">
                               <input type="submit" value="Update Category" class="btn btn-rounded btn-primary mb-5" >
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
