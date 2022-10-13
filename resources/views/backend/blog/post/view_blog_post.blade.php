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
                <h3 class="box-title">Total Blog Posts <span class="badge badge-pill badge-info">{{count($blogPost)}}</span></h3>
                <a href="{{route('add_blog_post')}}" class="btn btn-success float-right">Add Blog Post</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              
                              <th>Post Category</th>
                              <th>Post Image</th>
                              <th>Post Title in English</th>
                              <th>Post Title in Swahili</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody >
                          @foreach ($blogPost as $item )


                          <tr >
                              
                              <td >{{$item->blogCategory->blog_category_name_eng}}</td>
                              <td><img src="{{asset($item->post_image)}}" alt="" style="width: 60px; height: 60px;"></td>
                              <td>{{$item->post_title_en}}</td>
                              <td>{{$item->post_title_swa}}</td>

                              <td width="15%">
                                  <a href="{{ route('edit_blog_post',$item->id) }}" class="btn btn-info btn-sm" title="Edit Blog Post" ><i class="fa fa-pencil"></i></a>
                                  <a href="{{ route('delete_blog_post',$item->id) }}" id="delete" class="btn btn-danger btn-sm" title="Delete Blog Category"
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

          
           <!-- /.col -->






        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

<!-- /.content-wrapper -->


@endsection
