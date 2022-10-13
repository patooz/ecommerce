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
                <h3 class="box-title">Deleted Orders List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                      <thead>
                          <tr>
                              <th>Date</th>
                              <th>Invoice</th>
                              <th>Amount</th>
                              <th>Payment Method</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $item )


                          <tr>
                              <td> {{$item->order_date}}   </td>
                              <td>{{$item->invoce_no}}</td>
                              <td>Ksh {{$item->amount}}</td>
                              <td>{{$item->payment_method}}</td>
                              <td><span class="badge badge-pill badge-primary">{{$item->status}}</span></td>



                              <td width="20%">
                                  <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info btn-sm" title="View Order" ><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('restore_deleted_order',$item->id) }}" class="btn btn-primary btn-sm" title="Restore Deleted Order " id="restore" ><i class="fa fa-cloud-upload"></i></a>
                                  
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
