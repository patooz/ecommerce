@extends('frontend.main_master')
@section('content')

<div class="container">
    <div class="content">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Shipping Details</h4></div>
                    <div><h4><span class="text-danger">Order No: {{ $order->order_number }}</span></h4></div>
                    <hr>
                    <div class="card-body" style="background-color: #e9ebec:">
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

            </div>{{-- end col-md-5 --}}



            <div class="col-md-5">
                <div class="card">
                    <div class="card-header"><h4>Order Details</h4></div>
                    <div><h4><span class="text-danger">Invoice: {{ $order->invoce_no }}</span></h4></div>
                    <hr>
                    <div class="card-body" style="background-color: #e9ebec:">
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



                        </table>

                    </div>

                </div>

            </div>{{-- end col-md-5 two --}}

            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h2 class="box-title">Order List</h2>
                          </div>
                          <div class="box-body">
                        <div class="table-responsive">



                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr style="background-color: #f3cbcb;">
                                        <td class="col-md-2">
                                            <label for="">Image</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">Product Name</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">Product Code</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">Color</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">Size</label>
                                        </td>

                                         <td class="col-md-1">
                                            <label for="">Quantity</label>
                                        </td>


                                        <td class="col-md-2">
                                            <label for="">Unit Price</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">Total</label>
                                        </td>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orderItem as $item)
                                    <tr >
                                        <td class="col-md-2">
                                            <label for=""><img src="{{ asset($item->products->product_thumbnail) }}" alt="" height="50px;" width="50px;"></label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">{{$item->products->product_name_en}}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">{{$item->products->product_code}}</label>
                                        </td>

                                        <td class="col-md-1">
                                             <label for="">{{$item->color}}</label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">{{$item->size}}</label>
                                       </td>

                                        <td class="col-md-1">
                                            <label for="">{{$item->qty}}</label>
                                        </td>

                                         <td class="col-md-2">
                                            <label for="">Ksh {{number_format($item->price,2,'.','')}} </label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">Ksh  {{number_format($item->price * $item->qty,2,'.','')}}</label>
                                        </td>




                                    </tr>

                                    @endforeach
                                </tbody>


                            </table>





                </div>
            </div>
            </div>
        </div>


            </div>{{-- end order item row --}}

            @if ($order->status !=="Delivered")

            @else

            @php
                $order=App\Models\Order::where('id',$order->id)->where('returned_reason','=',NULL)->first();

            @endphp

            @if ($order)

            <form action="{{route('return_order',$order->id)}}" method="post">
                @csrf

            <div class="form-group">
                <label for="label">Order Return Reason: </label>
                <textarea class="form-control" name="returned_reason" id="" cols="30" rows="5">Return Reason</textarea>

            </div>
                <button type="submit" class="btn btn-primary">Submit Return Request</button>

            </form>
            @else
            <div class="col-md-5">
                <span class="badge badge-pill badge-warning" style="background: #800000">You Already Sent Return Request For This Product</span>
            </div>
            
            @endif

            @endif
            <br><br>





        </div>{{-- end row --}}
    </div>

</div>



@endsection
