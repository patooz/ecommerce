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





          {{-- edit ward --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Ward</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.ward',$ward->id) }}" method="POST" >
                        @csrf


                    <div class="form-group">
                        <h5> Select County <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="county_id"  class="form-control">
                                <option value="" selected="" disabled="" >Select County</option>
                                @foreach ($counties as $item )


                           <option value="{{$item->id}}" {{ $item->id == $subcounties->county_id ? 'selected': ''  }} >{{$item->county_name}}</option>
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
                                    @foreach ($subcounty as $item)

                <option value="{{$item->id}}" {{ $item->id == $ward->subcounty_id ? 'selected': ''  }}>{{$item->subcounty_name}}</option>

                                    @endforeach
                                </select>
                                @error('subcounty_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>



                <div class="form-group">
                    <h5>Ward Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="ward_name" class="form-control" value="{{ $ward->ward_name }}">
                        @error('ward_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Update Ward" class="btn btn-rounded btn-primary mb-5" >

                               <a href="{{route('manage.ward')}}" class="btn btn-rounded btn-danger mb-5" style="float: right">Cancel</a>
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
