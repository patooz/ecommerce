@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->

      <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Order Details</li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Basic Box</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">



            <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong> </h4>
				  </div>

                  <table class="table table-bordered table-striped">
                    <tr>
                        <th>Shipping Name:</th>
                        <th>{{$order->name}}</th>
                    </tr>

                    <tr>
                        <th>Shipping Phone:</th>
                        <th>{{$order->phone}}</th>
                    </tr>

                    <tr>
                        <th>Shipping Email:</th>
                        <th>{{$order->email}}</th>
                    </tr>

                    <tr>
                        <th>County:</th>
                        <th>{{$order->county->county_name}}</th>
                    </tr>

                    <tr>
                        <th>Sub County:</th>
                        <th>{{$order->subcounty->subcounty_name}}</th>
                    </tr>


                    <tr>
                        <th>Ward:</th>
                        <th>{{$order->ward->ward_name}}</th>
                    </tr>

                    <tr>
                        <th>Postal Code:</th>
                        <th>{{$order->postal_code}}</th>
                    </tr>

                    <tr>
                        <th>Order Date:</th>
                        <th>{{$order->order_date}}</th>
                    </tr>

                </table>



				</div>
			  </div>

              <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong><div><span class="text-danger">Invoice: {{ $order->invoce_no }}</span></div> </h4>
				  </div>
                  <table class="table table-bordered table-striped">
                    <tr>
                        <th>Shipping Name:</th>
                        <th>{{$order->user->name}}</th>
                    </tr>

                    <tr>
                        <th>Phone No:</th>
                        <th>{{$order->user->phone}}</th>
                    </tr>

                    <tr>
                        <th>Payment type:</th>
                        <th>{{$order->payment_method}}</th>
                    </tr>

                    <tr>
                        <th>Transaction ID:</th>
                        <th>{{$order->transaction_id}}</th>
                    </tr>

                    <tr>
                        <th>Invoice:</th>
                        <th><span class="text-danger"></span>{{$order->invoce_no}}</th>
                    </tr>


                    <tr>
                        <th>Total Orders Amount:</th>
                        <th>Ksh {{$order->amount}}</th>
                    </tr>

                    <tr>
                        <th>Order Status:</th>
                        <th><span class="badge badge-pill badge-warning" style="background: #418DB9">{{$order->status}}</span></th>
                    </tr>

                    <tr>

                        <th>
                            @if ($order->status == 'Canceled')
                            <a class="btn btn-block btn-danger" href="{{route('cancel_Order',$order->id)}}" id="cancel">Delete Order</a>
                            @endif
                        </th>
                            
                            
                        <th>
                            @if ($order->status == 'Pending')
                            <a class="btn btn-block btn-success" href="{{route('confirm_pending',$order->id)}}" id="confirm">Confirm Order</a>

                            @elseif ($order->status == 'Confirmed')
                            <a class="btn btn-block btn-success" href="{{route('process_confirmed',$order->id)}}" id="processing">Process Order</a>

                            @elseif ($order->status == 'Processing')
                            <a class="btn btn-block btn-success" href="{{route('picked_order',$order->id)}}" id="picked">Picked Order</a>

                            @elseif ($order->status == 'Picked')
                            <a class="btn btn-block btn-success" href="{{route('ship_order',$order->id)}}" id="shipped">Ship Order</a>

                             @elseif ($order->status == 'Shipped')
                            <a class="btn btn-block btn-success" href="{{route('delivered_order',$order->id)}}" id="delivered">Delivered Order</a>

                            @elseif ($order->status == 'Canceled')
                            <a class="btn btn-block btn-primary" href="{{route('restore_to_pending',$order->id)}}" id="restore">Restore to Pending</a>

                            

                            @endif
                            
                        </th>
                    </tr>



                </table>
				</div>
			  </div>

              <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					{{-- <h4 class="box-title"><strong>Bordered</strong> box</h4> --}}
				  </div>

                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <td class="col-md-2">
                                <label for=""><strong>Image</strong> </label>
                            </td>

                            <td class="col-md-2">
                                <label for=""><strong> Product Name</strong></label>
                            </td>

                            <td class="col-md-1">
                                <label for=""><strong>Product Code</strong></label>
                            </td>

                            <td class="col-md-1">
                                <label for=""><strong>Color</strong></label>
                            </td>

                            <td class="col-md-1">
                                <label for=""><strong>Size</strong></label>
                            </td>

                             <td class="col-md-1">
                                <label for=""><strong>Quantity</strong></label>
                            </td>


                            <td class="col-md-2">
                                <label for=""><strong>Unit Price</strong></label>
                            </td>

                            <td class="col-md-2">
                                <label for=""><strong>Total</strong></label>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orderItem as $order)
                        <tr >
                            <td class="col-md-2">
                                <label for=""><img src="{{ asset($order->products->product_thumbnail) }}" alt="" height="50px;" width="50px;"></label>
                            </td>

                            <td class="col-md-2">
                                <label for="">{{$order->products->product_name_en}}</label>
                            </td>

                            <td class="col-md-1">
                                <label for="">{{$order->products->product_code}}</label>
                            </td>

                            <td class="col-md-1">
                                 <label for="">{{$order->color}}</label>
                            </td>

                            <td class="col-md-1">
                                <label for="">{{$order->size}}</label>
                           </td>

                            <td class="col-md-1">
                                <label for="">{{$order->qty}}</label>
                            </td>

                             <td class="col-md-2">
                                <label for="">Ksh {{number_format($order->price,2,'.','')}} </label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Ksh  {{number_format($order->price * $order->qty,2,'.','')}}</label>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                    
                </table>
				</div>
			  </div>










        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
