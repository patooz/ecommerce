@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Total Users <span class="badge badge-pill badge-info">{{count($users)}}</span></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user )


                          <tr>
                            <td> <img src="{{ (!empty($user->profile_photo_path))?
        url ('upload/user_images/'.$user->profile_photo_path): url('upload/no_image.jpg') }}" style="height: 50px; width: 50px;" >  </td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email }}</td>
                              <td>{{$user->phone }}</td>

                              @if ($user->onlineUser())
                              <td><span class="badge badge-pill badge-success">Online</span></td>
                              @else
                              <td><span class="badge badge-pill badge-danger">Last Seen {{Carbon\Carbon::parse($user->last_seen)->diffForhumans()}} </span></td>
                              @endif
                              
                              
                              <td>
                                  <a href="" class="btn btn-info" title="Edit User" ><i class="fa fa-pencil"></i></a>
                                  <a href="" id="delete" class="btn btn-danger" title="Delete User"
                                    ><i class="fa fa-trash" ></i></a>
                              </td>

                          </tr>
                          @endforeach

                      </tbody>

                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>

          </div>
          <!-- /.col-12 -->

         






        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
