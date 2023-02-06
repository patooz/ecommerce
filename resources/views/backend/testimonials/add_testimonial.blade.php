
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<div class="container-full">

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add Testimonial</h4>

       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{ route('store_testimonial') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                   <div class="col-10">
                       <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control"

                                     aria-invalid="false"> <div class="help-block"></div></div>
                            </div>

                           </div>

                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Company <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="company" class="form-control"  >
                                     <div class="help-block"></div></div>
                            </div>
                        </div>


                        </div>

                         <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <h5>Description in English <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="description_en" id="" cols="50" rows="5"></textarea>
                                     <div class="help-block"></div></div>
                            </div>

                           </div>

                           <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Description in Swahili <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description_swa" id="" cols="50" rows="5"></textarea>
                                         <div class="help-block"></div></div>
                                </div>

                               </div>




    </div>

       </div>



         </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5> Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control"
                                        required="" id="ima" >
                                    </div>
                                </div>

                            </div>

                           <div class="col-md-6">
                                <img id="showIma" src=" {{url('upload/no_image.jpg')}} "
                                     style="width: 100px; height:100px;">

                            </div>


                        </div>


            <hr>





                   <div class="text-xs-right">
                       <input type="submit" value="Add Testimonial" class="btn btn-rounded btn-primary mb-5" >
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
