@php
    $id=Auth::user()->id;
    $user=App\Models\User::find($id);
@endphp



<div class="col-md-2" ><br>
    <img src="{{ (!empty($user->profile_photo_path))?
        url ('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg') }}" class="card-image-top" style="border-radius: 50%" alt="" height="100%" width="100%"><br><br>
        <ul class="list-group list-group-flush">
            <a href="" class="btn btn-primary btn-sm btn-block" >Home</a>
            <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block" >Update Profile</a>
            <a href="{{ route('update.user.password') }}" class="btn btn-primary btn-sm btn-block" >Change Password</a>
            <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block" >My Orders</a>
            <a href="{{ route('returned_orders_list') }}" class="btn btn-primary btn-sm btn-block" >Returned Orders</a>
            <a href="{{ route('canceled_orders_list') }}" class="btn btn-primary btn-sm btn-block" >Canceled Orders</a>
            <a href="{{route ('user.logout')}}" class="btn btn-danger btn-sm btn-block" >Logout</a>


        </ul>

</div>
