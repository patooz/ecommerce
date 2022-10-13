@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')


            <div class="col-md-2">

            </div>

            <div class="col-md-6">
                <div class="card" >
                    <h3 class="text-center">
                        <span class="text-danger" >Change Your Password</strong>

                    </h3>
                    <div class="card-body">
                        <form action="{{ route('change.user.password') }}" method="post"  >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Current Password <span></span></label>
                                <input type="password" id="current_password"   class="form-control " name="oldpassword"  >

                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">New Password <span></span></label>
                                <input type="password" id="password" class="form-control " name="password"  >

                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Phone Number <span></span></label>
                                <input type="password" id="password_confirmation" class="form-control " name="password_confirmation"  >

                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-danger" >Update</button>

                            </div>


                        </form>

                    </div>



                </div>

            </div>

        </div>
    </div>

</div>



@endsection
