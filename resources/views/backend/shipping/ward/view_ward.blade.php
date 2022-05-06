@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset ('frontend/assets/js/jquery.min.js')}}"></script>


<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Ward List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>

                              <th>Ward Name</th>
                              <th>Subcounty </th>
                              <th>County</th>
                              <th style="width: 25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($wards as $item )


                          <tr>

                              <td>{{$item->ward_name}}</td>
                              <td>{{$item->subcounty_id}}</td>
                              <td>{{$item->county_id}}</td>


                              <td>
                                  <a href="{{ route('edit.ward',$item->id) }}" class="btn btn-info" title="Edit Ward" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete.ward',$item->id) }}" id="delete" class="btn btn-danger" title="Delete Ward"
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

          {{-- Add County --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Ward</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('store.ward') }}" method="POST" >
                        @csrf


                        <div class="form-group">
                            <h5> Select County <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="county_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select County</option>
                                    @foreach ($counties as $item )


                                    <option value="{{$item->id}}">{{$item->county_name}}</option>
                                    @endforeach
                                </select>
                                @error('county_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5> Select Subcounty <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcounty_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select Subcounty</option>


                                </select>
                                @error('subcounty_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>



                <div class="form-group">
                    <h5>Ward Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="ward_name" class="form-control">
                        @error('ward_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Add Ward" class="btn btn-rounded btn-primary mb-5" >
                           </div>
                       </form>


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

<script type="text/javascript" >

$(document).ready(function(){
        $('select[name="county_id"]').on('change', function(){
            var county_id = $(this).val();
            if (county_id) {
                $.ajax({
                    url: "{{ url('/shipping/subcounty/ajax') }}/"+county_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){

                        var d =$('select[name="subcounty_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcounty_id"]').append('<option value="'+ value.id +'">' + value.subcounty_name + '</option>');
                        });
                    },
                });

            } else {
                alert('danger');

            }
        });
    });




</script>



@endsection
