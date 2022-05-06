@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">




          {{-- Add County --}}
          <div class="col-10">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Subcounty</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.subcounty',$subcounty->id) }}" method="POST" >
                        @csrf



                        <div class="form-group">
                            <h5> Select County <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="county_id"  class="form-control">
                                    <option value="" selected="" disabled="" >Select County</option>
                                    @foreach ($counties as $item )


                                    <option value="{{$item->id}}" {{ $item->id == $subcounty->county_id ? 'selected': ''  }}>{{$item->county_name}}</option>
                                    @endforeach
                                </select>
                                @error('county_id')
                                        <span class="text-danger">{{ $message }}</span>

                                        @enderror
                            </div>
                        </div>



                <div class="form-group">
                    <h5>Subcounty Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="subcounty_name" class="form-control" value="{{ $subcounty->subcounty_name }}">
                        @error('subcounty_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Update Subcounty" class="btn btn-rounded btn-primary mb-5" >

                               <a href="{{route('manage.subcounty')}}" class="btn btn-rounded btn-danger mb-5" style="float: right">Cancel</a>
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


@endsection
