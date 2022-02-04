
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Change Admin Password</h4>

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{ route('update.admin.password') }}" method="POST" >
                @csrf
                 <div class="row">
                   <div class="col-12">
                       <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="oldpassword" class="form-control" id="current_password" required=""
                                    data-validation-required-message="This field is required"
                                     aria-invalid="false"> <div class="help-block"></div></div>
                            </div>

                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" id="password" required=""
                                    data-validation-required-message="This field is required"
                                     aria-invalid="false"> <div class="help-block"></div></div>
                            </div>

                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required=""
                                    data-validation-required-message="This field is required"
                                     aria-invalid="false"> <div class="help-block"></div></div>
                            </div>

                           </div>




                        </div>






                   <div class="text-xs-right">
                       <input type="submit" value="Update" class="btn btn-rounded btn-primary mb-5" >
                   </div>
               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>
    <!-- /.content -->
  </div>



  @endsection
