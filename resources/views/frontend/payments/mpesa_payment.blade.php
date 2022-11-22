@extends('frontend.main_master')
@section('content')

@section('title')
Lipa Na Mpesa Online Confirmation
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset ('frontend/assets/js/jquery.min.js')}}"></script>



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Lipa Na Mpesa Online Confirmation</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Amount</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">


                    <hr>
					<li>
                        @if (Session::has('coupon'))

						<strong>Subtotal:</strong> Ksh{{$cartTotal}} <hr>
                        <strong>Coupon:</strong> {{session()->get('coupon')['coupon_name']}}
						<strong class="text-danger">(-{{session()->get('coupon')['coupon_discount']}}%)</strong>  <hr>
                        <strong>Coupon Discount:</strong> Ksh {{session()->get('coupon')['discount_amount']}} <hr>

                        <strong>Grand Total:</strong> Ksh {{session()->get('coupon')['total_amount']}} <hr>

                        @else
                        <strong>Subtotal:</strong> Ksh{{$cartTotal}} <hr>
                        <strong>Grand Total:</strong> Ksh{{$cartTotal}} <hr>



                    @endif
                </li>



				</ul>
			</div>
		</div>
	</div>
</div>
<!-- checkout-progress-sidebar -->
</div> {{-- end col-d-6 --}}



<div class="col-md-6">
    <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Lipa Na Mpesa Online</h4>
</div>


        <form action="{{route('stk_push')}}" method="post" id="payment-form">
                    @csrf
                <div class="form-row">
                    <img src="{{ asset('frontend/assets/images/payments/mpesa_online.jpg') }}">

                <label for="card-element">


                <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                <input type="hidden" name="postal_code" value="{{$data['postal_code']}}">
                <input type="hidden" name="county_id" value="{{$data['county_id']}}">
                <input type="hidden" name="subcounty_id" value="{{$data['subcounty_id']}}">
                <input type="hidden" name="ward_id" value="{{$data['ward_id']}}">
                <input type="hidden" name="notes" value="{{$data['notes']}}">
                <input type="hidden" name="cartTotal" value="{{$data['cartTotal']}}">
                <input type="hidden" name="user" value="{{$data['user']}}">
                </label>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
                </div>
                <br>
                <button class="btn btn-primary">Submit Payment</button>
        </form>


</div>
</div>
</div>
<!-- checkout-progress-sidebar -->
</div> {{-- end col-md-6 --}}
</form>










			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ========================== BRANDS CAROUSEL ============== -->

        @include('frontend.body.brands')

<!--============= BRANDS CAROUSEL : END ============== -->	</div><!-- /.container -->
</div><!-- /.body-content -->










@endsection


