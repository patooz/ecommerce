@extends('frontend.main_master')
@section('content')

@section('title')
Track Order
@endsection



<style type="text/css">
  body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }

 .container {

 }

 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #0f6cb2
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #157ed2;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }

</style>


<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">



            <div class="row" style="margin-left: 30px; margin-top: 20px;">
              <div class="col-md-2">
                <b>Invoice Number</b>
                {{$track->invoce_no}}
              </div>



              <div class="col-md-2">
                <b>Order Date</b><br>
                {{$track->order_date}}
              </div>

              <div class="col-md-2">
                <b>Shipping Address</b><br>
                {{$track->name}}<br>
                {{$track->county->county_name}},
                {{$track->subcounty->subcounty_name}}
              </div>



              <div class="col-md-2">
                <b>Order Date</b>
                {{$track->invoce_no}}
              </div>


              <div class="col-md-2">
                <b>Invoice Number</b>
                {{$track->invoce_no}}
              </div>


              <div class="col-md-2">
                <b>Invoice Number</b>
                {{$track->invoce_no}}
              </div>
            </div>








            <div class="track">
              @if($track->status == 'Pending')
              <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text">Order Delivered</span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>

              @elseif ($track->status == 'Confirmed')
              <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>

                @elseif ($track->status == 'Processing')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>

                 @elseif ($track->status == 'Picked')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>

                @elseif ($track->status == 'Shipped')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>

                @elseif ($track->status == 'Delivered')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>

              <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Order Confirmed</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-tasks"></i> </span> <span class="text"> In Process</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-product-hunt"></i> </span> <span class="text">Ready for Pickup</span> </div>

                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the Way </span> </div>

                <div class="step active"> <span class="icon"> <i class="fas fa-medal"></i> </span> <span class="text"> Order Delivered </span> </div>
              @endif





            </div>

            <hr>

            <ul class="row">
                <li class="col-md-4">


                    @foreach ($order_item as $item)


                    @php
                    $amount=$item->products->selling_price - $item->products->discount_price;
                    $discount=($amount/$item->products->selling_price)*100;
                     @endphp


                    <figure class="itemside mb-3">

                        <div class="aside"><img src="{{asset($item->products->product_thumbnail)}}" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title">@if (session()->get('language') == 'Kiswahili'){{ $item->products->product_name_swa}} @else {{ $item->products->product_name_en }} @endif</p> <span class="text-muted">@if ($item->products->discount_price == NULL)
                                <strong>Ksh {{$item->products->selling_price}}</strong>


                            @else
                            <strong> Ksh {{$item->products->discount_price}}</strong>


                            @endif </span>
                        </figcaption>


                    </figure>
                    @endforeach



                </li>
            </ul>

            <hr><br><br>

            <a href="{{route('my.orders')}}" class="btn btn-primary" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Orders</a>

        </div>
    </article>
</div><br>






@endsection
