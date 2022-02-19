@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">



          <div class="col-8">

<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Slider List</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Slider Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($sliders as $item )


    <tr>

        <td> <img src="{{asset($item->slider_img)}}" style="height: 50px; width: 80px;" >  </td>
        <td>
        @if ($item->title == NULL)
        <span class="badge badge-pill badge-danger">No Title</span>

        @else
        {{$item->title}}</td>
        @endif

        <td>{{$item->description}}</td>


        <td>
        @if ($item->status == 1)
        <span class="badge badge-pill badge-success">Active</span>
        @else
        <span class="badge badge-pill badge-danger">Inactive</span>
        @endif

    </td>
        <td width="30%">
            <a href="{{ route('edit.slider',$item->id) }}" class="btn btn-info btn-sm" title="Edit slider" ><i class="fa fa-pencil"></i></a>
            <a href="{{ route('delete.slider',$item->id) }}" id="delete" class="btn btn-danger btn-sm" title="Delete slider"
            ><i class="fa fa-trash" ></i></a>


        @if ($item->status == 1)
        <a href="{{ route('inactive.slider',$item->id) }}" class="btn btn-danger btn-sm" title="Inactivate Slider" ><i class="fa fa-arrow-down"></i></a>

        @else
        <a href="{{ route('active.slider',$item->id) }}" class="btn btn-success btn-sm" title="Activate Slider" ><i class="fa fa-arrow-up"></i></a>

        @endif


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

          {{-- Add Slider --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Slider</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">

        <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data" >
            @csrf


            <div class="form-group">
                <h5>Slider Title <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="title" class="form-control">

                </div>

            </div>

            <div class="form-group">
                <h5>Slider Description <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="description" class="form-control">

                    </div>

            </div>

            <div class="form-group">
                <h5>Slider Image <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="slider_img" class="form-control">
                    @error('slider_img')
                <span class="text-danger">{{ $message }}</span>

                @enderror
                    </div>

            </div>



    <div class="text-xs-right">
        <input type="submit" value="Add Slider" class="btn btn-rounded btn-primary mb-5" >
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
