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
                <!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Sign in</h4>
    <p class="">Hello, Welcome to your account.</p>
    <div class="social-sign-in outer-top-xs">
        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
    </div>


    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
            @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">User Name <span>*</span></label>
            <input type="email" id="email" name="email" class="form-control unicase-form-control text-input">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <i class="fa fa-eye" id="togglePassword"></i>
            <input type="password" id="password" class="form-control unicase-form-control text-input" name="password" >

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>



        </div>
        <div class="col-md-12"><a href="{{ route('register') }}" class="forgot-password pull-right">Register Account</a></div>


        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
    </form>


</div>
<!-- Sign-in -->

</div><!-- /.row -->
        </div><!-- /.sigin-in-->



@include('frontend.body.brands')


           </div><!-- /.container -->
</div><!-- /.body-content -->



@endsection
