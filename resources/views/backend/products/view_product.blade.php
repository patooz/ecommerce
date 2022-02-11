@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
              </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product En</th>
                    <th>Product Swa</th>
                    <th>Product Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($products as $item )


<tr>
    <td><img src="{{asset($item->product_thumbnail)}}" style="width: 80px; height: 100px; ">  </i></span>  </td>
    <td>{{$item->product_name_en}}</td>
    <td>{{$item->product_name_swa}}</td>
    <td>{{$item->product_qty}}</td>


    <td width="15%">
        <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info" title="Edit Category" ><i class="fa fa-pencil"></i></a>
        <a href="{{ route('delete.category',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Category"
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






        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
