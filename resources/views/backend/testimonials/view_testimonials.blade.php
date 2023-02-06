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
                <h3 class="box-title">All Testimomials</h3>
                <a href="{{route('add_testimonial')}}" class="btn btn-info" style="float: right;" >Add Testimonial</a>
                {{-- <button data-toggle="modal" data-target="#addTestimonial" class="btn btn-info" style="float: right;" >Add Testimonial</button> --}}



              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                      <thead>
                          <tr>
                              <th>Image</th>
                              <th>Name</th>
                              <th>Description en</th>
                              <th>Description swa</th>
                              <th>Company</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($testimonials as $item )


                          <tr>
                              <td> <img src="{{asset($item->image)}}" alt="" style="width: 50px; height: 50px;"></td>
                              <td>{{$item->name}}</td>
                              <td>{{$item->description_en}}</td>
                              <td>{{$item->description_swa}}</td>
                              <td>{{$item->company}}</td>


                              <td >
                                  <a href="{{ route('edit_testimonial',$item->id) }}" class="btn btn-info btn-sm" title="Edit Testimonial" ><i class="fa fa-pencil"></i></a>



                                  <a href="{{ route('delete_testimonial',$item->id) }}" id="deleteTestimonial" class="btn btn-danger btn-sm" title="Delete Testimonial"
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








        </div>






        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->

  @endsection

  <div class="modal fade" id="addTestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div>





