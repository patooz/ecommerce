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
                <h3 class="box-title">Total Subcategories <span class="badge badge-pill badge-info">{{count($subcategory)}}</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Category</th>
                              <th>Subcategory in Eng</th>
                              <th>Subcategory in Swa</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subcategory as $item )


                          <tr>
                              <td>{{isset($item['category']['category_name_en'])}}</td>
                              <td>{{$item->subcategory_name_en}}</td>
                              <td>{{$item->subcategory_name_swa}}</td>

                              <td width="30%" >
                                  <a href="{{ route('edit.subcategory',$item->id) }}" class="btn btn-info" title="Edit Category" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.subcategory',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Category"
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
                 <h3 class="box-title">Add Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.subcategory') }}" method="POST" >
                        @csrf


                        <div class="form-group">
                            <h5> Select Category <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Category</option>
                                    @foreach ($categories as $category )


                                    <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                                    <div class="form-group">
                                        <h5>Subcategory Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" class="form-control">
                                            @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Subcategory Name in Swahili  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_swa" class="form-control">
                                            @error('subcategory_name_swa')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>






                           <div class="text-xs-right">
                               <input type="submit" value="Add Subcategory" class="btn btn-rounded btn-primary mb-5" >
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
