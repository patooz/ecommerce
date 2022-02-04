@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img src="{{ (!empty($user->profile_photo_path))?
                    url ('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg') }}" class="card-image-top" style="border-radius: 50%" alt="" height="100%" width="100%" ><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block" >Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" >Update Profile</a>
                        <a href="" class="btn btn-primary btn-sm btn-block" >Change Password</a>
                        <a href="{{route ('user.logout')}}" class="btn btn-danger btn-sm btn-block" >Logout</a>


                    </ul>

            </div>

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
