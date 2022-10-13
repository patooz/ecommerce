@extends('frontend.main_master')
@section('content')

<div class="container">
    <div class="content">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2">
            </div>

            <div class="col-md-10">
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
                                    <label for="">Date</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Total Amount</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Payment</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">Order</label>
                                </td>

                                 <td class="col-md-3">
                                    <label for="">Action</label>
                                </td>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($orders as $order)
                            <tr >
                                <td class="col-md-2">
                                    <label for="">{{$order->order_date}}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Ksh {{number_format($order->amount,2,'.','')}}</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">{{$order->payment_method}}</label>
                                </td>

                                <td class="col-md-2">
                                     <label for="">{{$order->invoce_no}}</label>
                                </td>

                                <td class="col-md-1">
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9">{{$order->status}}</span>
                                    <label for=""></label>
                                </td>

                                <td class="col-md-3">
                                    <a href="{{url('user/order_details/'.$order->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                    <a target="_blank" href="{{url('user/download-invoice/'.$order->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i>Invoice</a>
                                </td>
                            </tr>

                            @empty
                            <h2 class="text-info">No Canceled Order Yet</h2>

                            @endforelse
                        </tbody>







                        </tbody>

                    </table>





        </div>
    </div>
    </div>
</div>






        </div>
    </div>

</div>



@endsection
