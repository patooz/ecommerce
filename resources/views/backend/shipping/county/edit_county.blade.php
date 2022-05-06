@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">





          {{-- Edit County  --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add County</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">

                    <form action="{{ route('update.county',$county->id) }}" method="POST" >
                        @csrf


                <div class="form-group">
                    <h5>County Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="county_name" class="form-control" value="{{$county->county_name}}">
                        @error('county_name')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>

                </div>



                           <div class="text-xs-right">
                               <input type="submit" value="Update County" class="btn btn-rounded btn-primary mb-5" >
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
