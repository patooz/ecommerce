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
                <h3 class="box-title">All Amin Users</h3>
                <a href="{{route('add_admin_user')}}" class="btn btn-info" style="float: right;" >Add Admin User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Access</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($adminuser as $item )


                          <tr>
                              <td> <img src="{{asset($item->profile_photo_path)}}" alt="" style="width: 50px; height: 50px;"></td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                @if($item->brand == 1)
                                <span class="badge badge-dark">Brand</span>
                                @else
                                @endif

                                @if($item->brand == 1)
                                <span class="badge badge-primary">Brand</span>
                                @else                                
                                @endif

                                @if($item->brand == 1)
                                <span class="badge badge-success">Brand</span>
                                @else                               
                                @endif

                                @if($item->brand == 1)
                                <span class="badge badge-info">Brand</span>
                                @else
                                @endif

                                @if($item->brand == 1)
                                <span class="badge badge-secondary">Brand</span>
                                @else                                
                                @endif

                                @if($item->category == 1)
                                <span class="badge badge-danger">Category</span>
                                @else                                
                                @endif

                                @if($item->product == 1)
                                <span class="badge badge-warning">Product</span>
                                @else                                
                                @endif

                                @if($item->slider == 1)
                                <span class="badge badge-light">Slider</span>
                                @else
                                @endif

                                @if($item->coupons == 1)
                                <span class="badge badge-dark">Coupons</span>
                                @else                                
                                @endif

                                @if($item->shipping == 1)
                                <span class="badge badge-primary">Shipping</span>
                                @else
                                @endif

                                @if($item->blog == 1)
                                <span class="badge badge-secondary">Blog</span>
                                @else 
                                @endif

                                @if($item->orders == 1)
                                <span class="badge badge-success">Orders</span>
                                @else
                                @endif

                                @if($item->stock == 1)
                                <span class="badge badge-warning">Stock</span>
                                @else
                                @endif

                                @if($item->reports == 1)
                                <span class="badge badge-danger">Reports</span>
                                @else
                                @endif

                                @if($item->users == 1)
                                <span class="badge badge-info">Users</span>
                                @else
                                @endif

                                @if($item->returnorder == 1)
                                <span class="badge badge-light">Return Order</span>
                                @else
                                @endif

                                @if($item->review == 1)
                                <span class="badge badge-dark">Review</span>
                                @else
                                @endif

                                @if($item->settings == 1)
                                <span class="badge badge-primary">Settings</span>
                                @else
                                @endif

                                @if($item->adminuser == 1)
                                <span class="badge badge-secondary">Admin User</span>
                                @else
                                @endif

                                @if($item->orders == 1)
                                <span class="badge badge-success">Orders</span>
                                @else
                                @endif
                                
                                
                              </td>
                              



                              <td width="20%">
                                  <a href="{{ route('edit_admin_user',$item->id) }}" class="btn btn-info" title="Edit User" ><i class="fa fa-pencil"></i></a>

                                   

                                  <a href="{{ route('delete_admin_user',$item->id) }}" id="deleteAdminUser" class="btn btn-danger" title="Delete User"
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
          <!-- /.col -->








        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
