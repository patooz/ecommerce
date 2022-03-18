@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                 <h3 class="box-title">Edit Sub-Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.subsubcategory') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="id" value="{{ $subsubcategories->id }}">


                        <div class="form-group">
                            <h5> Select Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}" {{$category->id == $subsubcategories->category_id ? 'selected' : ''  }} >{{$category->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5> Select Subcategory <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="sub_category_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Subcategory</option>


                                    @foreach ($subcategories as $sub )
                                    <option value="{{$sub->id}}" {{$sub->id == $subsubcategories->sub_category_id ? 'selected' : ''  }} >{{$sub->subcategory_name_en}}</option>
                                    @endforeach

                                </select>
                                @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                                    <div class="form-group">
                                        <h5>Sub-Subcategory Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control"  value="{{ $subsubcategories->subsubcategory_name_en }}"  >
                                            @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-Subcategory Name in Swahili  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_swa" class="form-control" value="{{ $subsubcategories->subsubcategory_name_swa }}" >
                                            @error('subsubcategory_name_swa')
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
