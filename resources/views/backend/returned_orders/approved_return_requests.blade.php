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
                <h3 class="box-title">Return Orders List</h3>
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
                              <td>
                              @if($item->returned_order == 1)
                              
                                <span class="badge badge-pill badge-primary">Pending Return Request</span>
                                @elseif($item->returned_order == 2)
                                <span class="badge badge-pill badge-success">Approved Request</span>
                              

                              @endif
                              </td>
                              



                              <td width="20%">
                                  <span class="badge badge-success">Order Returned</span>
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
