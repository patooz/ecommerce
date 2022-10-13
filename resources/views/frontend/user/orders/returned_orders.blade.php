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

                                 <td class="col-md-3">
                                    <label for="">Order Number</label>
                                </td>

                                <td class="col-md-2">
                                    <label for="">Invoice</label>
                                </td>

                               

                                <td class="col-md-1">
                                    <label for="">Order Status</label>
                                </td>

                                 
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
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
                                     <label for="">{{$order->order_number}}</label>
                                </td>

                                <td class="col-md-2">
                                     <label for="">{{$order->invoce_no}}</label>
                                </td>

                                <td class="col-md-1">
                                    <label for="">
                                        @if($order->returned_order == 0)
                                    <span class="badge badge-pill badge-warning" style="background: #418DB9">Return Request not yet sent</span>

                                    @elseif ($order->returned_order == 1)
                                    <span class="badge badge-pill badge-warning" style="background: indigo">Return Requested</span>
                                    </label>
                                    <span class="badge badge-pill badge-warning" style="background: #808000">Return Request Pending</span>

                                    @elseif ($order->returned_order == 2)
                                    <span class="badge badge-pill badge-warning" style="background: #008000">Return Request Successfull</span>
                                    @endif

                                    
                                </td>

                                
                            </tr>

                            @endforeach
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
