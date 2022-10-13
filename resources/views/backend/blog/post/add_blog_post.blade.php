@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset ('frontend/assets/js/jquery.min.js')}}"></script>

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Add Blog Post</h4>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" action="{{ route('store_blog_post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="row"> {{-- start 1st row  --}}


        </div>   {{-- end 1st row --}}

        <div class="row"> {{-- start 2nd row  --}}

           

            <div class="col-md-6">


    <div class="form-group">
        <h5>Post Title in English <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="post_title_en" class="form-control" required data-validation-required-message="This field is required">
            @error('post_title_en')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-6 --}}

        <div class="col-md-6">

        <div class="form-group">
            <h5>Post Title in Swahili <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="post_title_swa" class="form-control" required data-validation-required-message="This field is required">
                @error('post_title_swa')
                <span class="text-danger">{{ $message }}</span>

                @enderror
                </div>
        </div>

        </div>   {{-- end col-md-6 --}}

        </div>   {{-- end 2nd row --}}


        <div class="row"> {{-- start 6th row  --}}
             <div class="col-md-6">

    <div class="form-group">
    <h5> Select Blog Category <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="category_id"  class="form-control"required data-validation-required-message="This field is required">
            <option value="" selected="" disabled="" >Select Blog Category</option>

             @foreach ($blogCategory as $category )
                <option value="{{$category->id}}">{{$category->blog_category_name_eng}}</option>
                @endforeach

        </select>
        @error('category_id')
                <span class="text-danger">{{ $message }}</span>

                @enderror
    </div>
    </div>

            </div>   {{-- end col-md-6 --}}

    <div class="col-md-6">

            <div class="form-group">
                <h5>Post Main Image <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="post_image" class="form-control" required data-validation-required-message="This field is required" onchange="mainThumbUrl(this)">
                    @error('post_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <img src="" id="mainThmb">
                    </div>
            </div>

    </div>   {{-- end col-md-6 --}}

   

    </div>   {{-- end 6th row --}}


            <div class="row"> {{-- start 8th row  --}}
                <div class="col-md-6">
        <div class="form-group">
            <h5>Post Details in English <span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="controls">
                    <textarea id="editor1" name="post_details_en" rows="10" required data-validation-required-message="This field is required" cols="80"   >

                    </textarea>
                </div>

                </div>
        </div>

                </div>   {{-- end col-md-6 --}}

    <div class="col-md-6">

            <div class="form-group">
                <h5>Post Details in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <div class="controls">
                        <textarea id="editor2" name="post_details_swa" required data-validation-required-message="This field is required" rows="10" cols="80"  >

                        </textarea>
                    </div>

                    </div>
            </div>

            </div>   {{-- end col-md-6 --}}


            </div>   {{-- end 8th row --}}

            <hr>


</div>
<div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Submit">
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

   

<script>
    function mainThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader= new FileReader();
            reader.onload=function(e){
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);


        } else {

        }

    }
</script>




@endsection
