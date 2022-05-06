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
                 <h3 class="box-title">Edit Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.subcategory') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $subcategory->id }}">


                        <div class="form-group">
                            <h5> Select Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Category</option>
                                    @foreach ($categories as $category )

                                    <option value="{{$category->id}}" {{ $category->id == $subcategory->category_id ? 'selected': ''  }} >{{$category->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                                    <div class="form-group">
                                        <h5>Subcategory Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls"  >
                                            <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategory->subcategory_name_en }}">
                                            @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Subcategory Name in Swahili  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_swa" class="form-control" value="{{ $subcategory->subcategory_name_swa }}" >
                                            @error('subcategory_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>


                           <div class="text-xs-right">
                               <input type="submit" value="Update Subcategory" class="btn btn-rounded btn-primary mb-5" >
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
