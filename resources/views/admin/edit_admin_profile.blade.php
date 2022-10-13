
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Edit Admin Profile</h4>

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{ route('store.admin.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                   <div class="col-12">
                       <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin Username <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"  value="{{ $editData->name }}"

                                     aria-invalid="false"> <div class="help-block"></div></div>
                            </div>

                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Admin Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control"  value="{{ $editData->email }}">
                                     <div class="help-block"></div></div>
                            </div>
                        </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                            <input type="hidden" name="old_image" value="{{ $editData->profile_photo_path}}">
                            <input type="file" name="profile_photo_path" class="form-control"
                             id="image" >
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <img id="showImage" src="{{ (!empty($adminData->profile_photo_path))?
                                    url ('upload/admin_images'.$adminData->profile_photo_path): url('upload/no_image.jpg') }}"
                                     style="width: 100px; height:100px;">

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
