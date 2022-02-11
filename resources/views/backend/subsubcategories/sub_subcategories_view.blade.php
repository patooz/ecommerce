@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Sub-Subcategory List</h3>
              </div>
<!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Subcategory Name</th>
            <th>Sub-Subcategory in English</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subsubcategory as $item )


        <tr>
            <td>{{$item['category']['category_name_en']}}</td>
            <td>
            @if(isset($item['subcategory']['subcategory_name_en']))   {{ $item['subcategory']['subcategory_name_en'] }} </td>  @endif
            <td>{{$item->subsubcategory_name_en}}</td>

            <td width="30%" >
                <a href="{{ route('edit.subsubcategory',$item->id) }}" class="btn btn-info" title="Edit Category" ><i class="fa fa-pencil"></i></a>
                <a href="{{ route('delete.subsubcategory',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Category"
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
                 <h3 class="box-title">Add Sub-Subcategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.subsubcategory') }}" method="POST" >
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
                            <h5> Select Subcategory <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="sub_category_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Subcategory</option>

                                </select>
                                @error('sub_category_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                                    <div class="form-group">
                                        <h5>Sub-Subcategory Name in English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control">
                                            @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                            </div>

                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-Subcategory Name in Swahili  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_swa" class="form-control">
                                            @error('subsubcategory_name_swa')
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

<script type="text/javascript" >
    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d =$('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });

            } else {
                alert('danger');

            }
        });
    });


</script>


@endsection
