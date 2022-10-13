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
                <h3 class="box-title">Pending Reviews</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                      <thead>
                          <tr>
                              <th width="13%">Date</th>
                              <th>Product</th>
                              <th>Summary</th>
                              <th>Review</th>
                              <th>User</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($reviews as $item )


                          <tr>
                              <td width="13%">{{($item->created_at)}}</td>
                              <td>{{$item->product->product_name_en }}   </td>
                              <td>{{$item->summary}}</td>
                              <td>{{$item->review}}</td>
                              <td>{{$item->user->name }}</td>
                              <td>
                              @if($item->status == 0)
                              
                                <span class="badge badge-pill badge-primary">Pending Review</span>
                                @elseif($item->status == 1)
                                <span class="badge badge-pill badge-success">Approved Review</span>
                              

                              @endif
                              </td>
                              



                              <td width="19%">
                                  <a href="{{route('approve_review', $item->id)}}" class="btn btn-success">Approve Review</a>
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
