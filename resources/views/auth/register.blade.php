@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">


<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>
     <form method="POST" action="{{ route('register') }}">

            @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Full Name <span>*</span></label>
            <input type="text" name="name" class="form-control unicase-form-control text-input" id="name" >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
            <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone" >
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation" >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-12"><a href="{{ route('login') }}" class="forgot-password pull-right">Already Have an Account?</a></div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
    </form>


</div>
<!-- create a new account -->
</div><!-- /.row -->
        </div><!-- /.sigin-in-->



@include('frontend.body.brands')


           </div><!-- /.container -->
</div><!-- /.body-content -->



@endsection
