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
                <h3 class="box-title">Product Stock <span class="badge badge-pill badge-info">{{count($products)}}</span></h3>
              </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product En</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Discount</th>
                    <th>Product Status</th>
                    
                </tr>
            </thead>
            <tbody>
        @foreach ($products as $item )


<tr>
    <td><img src="{{asset($item->product_thumbnail)}}" style="width: 80px; height: 80px; ">  </i></span>  </td>
    <td>{{$item->product_name_en}}</td>
    <td>Ksh {{$item->selling_price}}</td>
    <td>{{$item->product_qty}} Pcs</td>


    <td>
        @if ($item->discount_price == NULL)
            <span class="badge badge-pill badge-danger">No Discount</span>

        @else
            @php
                $amount=$item->selling_price - $item->discount_price;
                $discount=($amount/$item->selling_price)*100;
            @endphp
            <span class="badge badge-pill badge-info">{{round($discount)}}%</span>

        @endif

    </td>


    <td>
        @if ($item->status == 1)
        <span class="badge badge-pill badge-success">Active</span>

        @else
        <span class="badge badge-pill badge-danger">Inactive</span>

        @endif

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
