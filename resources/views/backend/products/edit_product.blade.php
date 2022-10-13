@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->

    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
              <h4 class="box-title">Edit Product</h4>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" action="{{ route('update.product.data') }}" >
                    @csrf
                    <input type="hidden" name="id" value="{{$products->id}}">
                    <div class="row">
                      <div class="col-12">
                        <div class="row"> {{-- start 1st row  --}}

    <div class="col-md-4">

    <div class="form-group">
    <h5> Select Brand <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="brand_id"  class="form-control" required data-validation-required-message="This field is required">
            <option value="" selected="" disabled="" >Select Brand</option>
            @foreach ($brands as $brand )
            <option value="{{$brand->id}}" {{$brand->id == $products->brand_id? 'selected': ''}} >{{$brand->brand_name_en}}</option>
            @endforeach
        </select>
        @error('brand_id')
                <span class="text-danger">{{ $message }}</span>

                @enderror
    </div>
    </div>

            </div>   {{-- end col-md-4 --}}

            <div class="col-md-4">

    <div class="form-group">
        <h5> Select Category <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="category_id"  class="form-control" required data-validation-required-message="This field is required">
                <option value="" selected="" disabled="" >Select Category</option>
                @foreach ($categories as $category )
                <option value="{{$category->id}}" {{$category->id == $products->category_id? 'selected': ''}}>{{$category->category_name_en}}</option>
                @endforeach
            </select>
            @error('category_id')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
        </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

    <div class="form-group">
        <h5> Select Subcategory <span class="text-danger">*</span></h5>
        <div class="controls">
            <select name="subcategory_id"  class="form-control" required data-validation-required-message="This field is required">
                <option value="" selected="" disabled="" >Select Subcategory</option>
                @foreach ($subcategories as $sub )
                <option value="{{$sub->id}}" {{$sub->id == $products->subcategory_id? 'selected': ''}}>{{$sub->subcategory_name_en}}</option>
                @endforeach

            </select>
            @error('subcategory_id')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
        </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 1st row --}}











        <div class="row"> {{-- start 2nd row  --}}

            <div class="col-md-4">

    <div class="form-group">
    <h5> Select Sub-Subcategory <span class="text-danger">*</span></h5>
    <div class="controls">
        <select name="subsubcategory_id"  class="form-control"required data-validation-required-message="This field is required">
            <option value="" selected="" disabled="" >Select Sub-Subcategory</option>
            @foreach ($subsubcategories as $subsub )
            <option value="{{$subsub->id}}" {{$subsub->id == $products->subsubcategory_id? 'selected': ''}}>{{$subsub->subsubcategory_name_en}}</option>
            @endforeach

        </select>
        @error('subsubcategory_id')
                <span class="text-danger">{{ $message }}</span>

                @enderror
    </div>
    </div>

            </div>   {{-- end col-md-4 --}}

            <div class="col-md-4">


    <div class="form-group">
        <h5>Product Name in English <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_name_en }}">
            @error('product_name_en')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

        <div class="form-group">
            <h5>Product Name in Swahili <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_name_swa" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_name_swa }}" >
                @error('product_name_swa')
                <span class="text-danger">{{ $message }}</span>

                @enderror
                </div>
        </div>

        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 2nd row --}}











        <div class="row"> {{-- start 3rd row  --}}

            <div class="col-md-4">


    <div class="form-group">
        <h5>Product Code <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_code }}" readonly>
            @error('product_code')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

            </div>   {{-- end col-md-4 --}}

            <div class="col-md-4">


    <div class="form-group">
        <h5>Product Quantity <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_qty" class="form-control" required="" value="{{ $products->product_qty }}">
            @error('product_qty')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

        <div class="form-group">
            <h5>Product Tags in English <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_tags_en" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_tags_en }}" data-role="tagsinput" placeholder="add tags">
                @error('product_tags_en')
                <span class="text-danger">{{ $message }}</span>

                @enderror
                </div>
        </div>

        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 3rd row --}}











        <div class="row"> {{-- start 4th row  --}}

            <div class="col-md-4">



    <div class="form-group">
        <h5>Product Tags in Swahili <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_tags_swa" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_tags_swa }}" data-role="tagsinput" placeholder="Ongeza Lebo">
            @error('product_tags_swa')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

            </div>   {{-- end col-md-4 --}}

            <div class="col-md-4">



    <div class="form-group">
        <h5>Product Size in English <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_size_en" class="form-control"  value="{{ $products->product_size_en }}" data-role="tagsinput" placeholder="Add Size Tags">

            </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

            <div class="form-group">
                <h5>Product Size in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="product_size_swa" class="form-control"  value="{{ $products->product_size_swa }}" data-role="tagsinput" placeholder="Ongeza Lebo za Ukubwa">
                   
                    </div>
            </div>

        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 4th row --}}






        <div class="row"> {{-- start 5th row  --}}
            <div class="col-md-6">
    <div class="form-group">
        <h5>Product Color in English <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_color_en" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_color_en }}" data-role="tagsinput" placeholder="Add Color Tags">
            @error('product_color_en')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

            </div>   {{-- end col-md-6 --}}

            <div class="col-md-6">

    <div class="form-group">
        <h5>Product Color in Swahili <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_color_swa" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->product_color_swa }}" data-role="tagsinput" placeholder="Ongeza Lebo za Rangi">
            @error('product_color_swa')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-6 --}}


        </div>   {{-- end 5th row --}}



        <div class="row"> {{-- start 6th row  --}}

        <div class="col-md-6">

            <div class="form-group">
                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="selling_price" class="form-control" required data-validation-required-message="This field is required" value="{{ $products->selling_price }}">
                    @error('selling_price')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>
            </div>


        </div>   {{-- end col-md-6 --}}





            <div class="col-md-6">
    <div class="form-group">
        <h5>Product Discount Price <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}">
            @error('discount_price')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

    </div>   {{-- end col-md-6 --}}

    </div>   {{-- end 6th row --}}



            <div class="row"> {{-- start 7th row  --}}
                <div class="col-md-6">
        <div class="form-group">
            <h5>Product Short Description in English <span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="controls">
                    <textarea name="short_description_en" id="textarea" class="form-control" required data-validation-required-message="This field is required" required placeholder="Short Description">
                        {!! $products->short_description_en !!}
                    </textarea>
                </div>

                </div>
        </div>

                </div>   {{-- end col-md-6 --}}

    <div class="col-md-6">

            <div class="form-group">
                <h5>Product Short Description in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <div class="controls">
                        <textarea name="short_description_swa" id="textarea" class="form-control" required data-validation-required-message="This field is required" required placeholder="Maelezo Fupi">
                            {!! $products->short_description_swa !!}
                        </textarea>
                    </div>

                    </div>
            </div>

            </div>   {{-- end col-md-6 --}}


            </div>   {{-- end 7th row --}}







            <div class="row"> {{-- start 8th row  --}}
                <div class="col-md-6">
        <div class="form-group">
            <h5>Product Long Desccription in English <span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="controls">
                    <textarea id="editor1" name="long_description_en" rows="10" required data-validation-required-message="This field is required" cols="80"   >
                        {!! $products->long_description_en !!}

                    </textarea>
                </div>

                </div>
        </div>

                </div>   {{-- end col-md-6 --}}

    <div class="col-md-6">

            <div class="form-group">
                <h5>Product Long Desccription in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <div class="controls">
                        <textarea id="editor2" name="long_description_swa" required data-validation-required-message="This field is required" rows="10" cols="80"  >
                            {!! $products->long_description_swa !!}

                        </textarea>
                    </div>

                    </div>
            </div>

            </div>   {{-- end col-md-6 --}}


            </div>   {{-- end 8th row --}}

            <hr>

<div class="row">
<div class="col-md-6">
    <div class="form-group">

        <div class="controls">
        <fieldset>
            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$products->hot_deals == 1 ? 'checked' : ''}}>
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{$products->featured == 1 ? 'checked' : ''}}>
            <label for="checkbox_3">Featured Products</label>
        </fieldset>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">

        <div class="controls">
    <fieldset>
        <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$products->special_offer == 1 ? 'checked' : ''}}>
        <label for="checkbox_4">Special Offer</label>
    </fieldset>
    <fieldset>
        <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$products->special_deals == 1 ? 'checked' : ''}}>
        <label for="checkbox_5">Special Deals</label>
    </fieldset>
        </div>
    </div>
</div>
</div>
</div>
<div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Update Product">
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

      {{-- Multi image update Area start--}}
      <section class="content">
          <div class="row">

            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Multiple Image <strong>Update</strong></h4>
				  </div>

                  <form action="{{ route('update.product.multi_image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-sm">
                        @foreach ($multi_imgs as $img )
                        <div class="col-md-3">

                <div class="card">
                    <img src="{{asset($img->photo_name)}}" class="card-img-top" style="width: 200px; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('delete.product.multi_img',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a></h5>

                        <p class="card-text">
                            <div class="form-group">
                                <label class="form-control-lable">Change Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="multi_img[{{$img->id}}]">
                            </div>
                        </p>
                    </div>
                    </div>

                        </div>{{--end col md-3--}}
                        @endforeach
                    </div>

                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Update Images">
                        <br>
                    </div>



                </form>


				</div>
			  </div>


          </div>{{-- end row --}}

      </section>
      {{-- Multi image update Area end--}}

      <!-- /.content -->



       {{-- Thumbnail image update Area start--}}
       <section class="content">
        <div class="row">

          <div class="col-md-12">
              <div class="box bt-3 border-info">
                <div class="box-header">
                  <h4 class="box-title">Thumbnail Image <strong>Update</strong></h4>
                </div>

    <form action="{{ route('update.product.thumb_nail') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">
        <input type="hidden" name="old_image" value="{{ $products->product_thumbnail }}">
        <div class="row row-sm">

            <div class="col-md-3">

    <div class="card">
        <img src="{{asset($products->product_thumbnail)}}" class="card-img-top" style="width: 200px; height: 200px;">
        <div class="card-body">


            <p class="card-text">
                <div class="form-group">
                    <label class="form-control-lable">Change Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="product_thumbnail" onChange="mainThumbUrl(this)" >
                    <img src="" id="mainThmb">
                </div>
            </p>
        </div>
        </div>

            </div>{{--end col md-3--}}

        </div>

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Update Images">
            <br>
        </div>



              </form>


              </div>
            </div>


        </div>{{-- end row --}}

    </section>
    {{-- Thumbnail image update Area end--}}







    </div>




    <script type="text/javascript" >
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });

                } else {
                    alert('danger');

                }
            });



            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub_subcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                            });
                        },
                    });

                } else {
                    alert('danger');

                }
            });
        });
    </script>


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


<script>

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>


@endsection
