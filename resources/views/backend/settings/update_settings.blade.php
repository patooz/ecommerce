
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Site Settings</h4>

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{ route('update_site_setting', $sitesettings->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                 <div class="row">
                   <div class="col-12">
                       <div class="row">
                           <div class="col-md-6">

                            <div class="form-group">
                                <h5>Site Logo <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="hidden" name="old_logo" value="{{ $sitesettings->logo }}">
                                    <input type="file" name="logo" class="form-control">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>First Phone Number <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="phone_one" class="form-control" value="{{$sitesettings->phone_one}}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Second Phone Number <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="phone_two" class="form-control" value="{{$sitesettings->phone_two }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" value="{{$sitesettings->email }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Company Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="company_name" class="form-control" value="{{$sitesettings->company_name }}">
                                     
                                 </div>
                            </div>

                             <div class="form-group">
                                <h5>Company Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="company_address" class="form-control" value="{{$sitesettings->company_address }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Facebook <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="facebook" class="form-control" value="{{$sitesettings->facebook }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Twitter <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="twitter" class="form-control" value="{{$sitesettings->twitter }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>LinkedIn <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="linkedin" class="form-control" value="{{$sitesettings->linkedin }}">
                                     
                                 </div>
                            </div>

                            <div class="form-group">
                                <h5>Youtube <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="youtube" class="form-control" value="{{$sitesettings->youtube }}">
                                     
                                 </div>
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
