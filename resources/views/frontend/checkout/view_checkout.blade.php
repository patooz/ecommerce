@extends('frontend.main_master')
@section('content')

@section('title')
Checkout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset ('frontend/assets/js/jquery.min.js')}}"></script>



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Chekout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">



	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">


				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					{{-- <h4 class="checkout-subtitle"><b>Shipping Address</b></h4> --}}

            <form class="register-form" action="{{ route('store-checkout') }}" method="POST">
                @csrf
                @php
                 $cartTotal= Gloudemans\Shoppingcart\Facades\Cart::total();
                @endphp
                <input type="hidden" name="cartTotal" value="{{$cartTotal}}">
                <div class="form-group">
                <label class="info-title" for="exampleInputEmail1"><b> Shipping Address Name</b> <span>*</span></label>
                <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{Auth::user()->name }}" required>
                </div>

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1"><b> Shipping Address Email</b> <span>*</span></label>
                    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{Auth::user()->email  }}" required>
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b> Shipping Address Phone Number</b> <span>*</span></label>
                        <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone Number" value="{{Auth::user()->phone  }}" required>
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1"><b> Postal Code</b> </label>
                            <input type="text" name="postal_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Postal Code">
                            </div>





        </div>
				<!-- already-registered-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">



                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b> Select County</b> <span>*</span></label>
                        <div class="controls">
                            <select name="county_id"  class="form-control" required data-validation-required-message="This field is required">
                                <option value="" selected="" disabled="" >Select County</option>
                                @foreach ($counties as $item )
                                <option value="{{$item->id}}">{{$item->county_name}}</option>
                                @endforeach
                            </select>
                            @error('county_id')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b> Select Subcounty</b> <span>*</span></label>
                        <div class="controls">
                            <select name="subcounty_id"  class="form-control" required data-validation-required-message="This field is required">
                                <option value="" selected="" disabled="" >Select Subcounty</option>

                            </select>
                            @error('subcounty_id')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1"><b> Select Ward</b> <span>*</span></label>
                        <div class="controls">
                            <select name="ward_id"  class="form-control" required data-validation-required-message="This field is required">
                                <option value="" selected="" disabled="" >Select Ward</option>

                            </select>
                            @error('ward_id')
                                    <span class="text-danger">{{ $message }}</span>

                                    @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Notes<span class="text-danger">*</span> </label>
                       <textarea class="form-control" name="notes" id="" cols="30" rows="5" placeholder="Notes"></textarea>
                        </div>


					  {{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button> --}}

				</div>
				<!-- already-registered-login -->

			</div>
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->


					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @foreach ($carts as $item)


					<li>
                        <strong>Image:</strong>
                        <img src="{{asset ($item->options->image)}}" style="height: 50px; width:50px;" alt="">
                    </li>


					<li>
                        <strong>Qty:</strong>
                       {{$item->qty }}

                       <strong>Color:</strong>
                       {{$item->options->color }}

                       <strong>Size:</strong>
                       {{$item->options->size }}
                    </li>
                    @endforeach

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
<!-- checkout-progress-sidebar -->				</div>



<div class="col-md-4">
    <!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Select Payment Method</h4>
</div>


<div class="row">

    <div class="col-md-4">

        <input type="radio" name="payment_method" value="stripe">
        <label for="">Stripe</label>
        <img src="{{ asset('frontend/assets/images/payments/stripe.png') }}" alt="">

    </div> {{-- col-md-4 --}}



    <div class="col-md-4">

        <input type="radio" name="payment_method" value="card">
        <label for="">Card</label>
        <img src="{{ asset('frontend/assets/images/payments/visa.png') }}" alt="">

        </div> {{-- col-md-4 --}}



    <div class="col-md-4">
        <input type="radio" name="payment_method" value="cash">
        <label for="">Cash</label>

        <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">

    </div> {{-- col-md-4 --}}

    <div class="col-md-4">
        <input type="radio" name="payment_method" value="mpesa">
        <label for="">Mpesa </label>

        <img src="{{ asset('frontend/assets/images/payments/mpesa.png') }}" alt="">

    </div> {{-- col-md-4 --}}

</div> {{-- end row --}}
<hr>
<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Proceed to Payment</button>


</div>
</div>
</div>
<!-- checkout-progress-sidebar -->				</div>
</form>










			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ========================== BRANDS CAROUSEL ============== -->

        @include('frontend.body.brands')

<!--============= BRANDS CAROUSEL : END ============== -->	</div><!-- /.container -->
</div><!-- /.body-content -->



<script type="text/javascript" >
    $(document).ready(function(){
        $('select[name="county_id"]').on('change', function(){
            var county_id = $(this).val();
            if (county_id) {
                $.ajax({
                    url: "{{ url('/get-subcounty/ajax') }}/"+county_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="ward_id"]').empty();

                        var d =$('select[name="subcounty_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcounty_id"]').append('<option value="'+ value.id +'">' + value.subcounty_name + '</option>');
                        });
                    },
                });

            } else {
                alert('danger');

            }
        });



        $('select[name="subcounty_id"]').on('change', function(){
            var subcounty_id = $(this).val();
            if (subcounty_id) {
                $.ajax({
                    url: "{{ url('/get-ward/ajax') }}/"+subcounty_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d =$('select[name="ward_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="ward_id"]').append('<option value="'+ value.id +'">' + value.ward_name + '</option>');
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


