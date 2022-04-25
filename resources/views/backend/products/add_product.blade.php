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
            <h4 class="box-title">Add Product</h4>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data">
                    @csrf
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
            <option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
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
                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
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
            <input type="text" name="product_name_en" class="form-control" required data-validation-required-message="This field is required">
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
                <input type="text" name="product_name_swa" class="form-control" required data-validation-required-message="This field is required">
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

            @php
                $products=DB :: table('products') -> get();

                @endphp
                @if (!$products)
                   <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required" value="1001" readonly>
               @else
                    @foreach ($products as $value)
                    @endforeach

                    @php
                      $code = $value->product_code +1;
                    @endphp



                    <input type="text" name="product_code" class="form-control" required data-validation-required-message="This field is required" value="{{$code}}" readonly>
                @endif





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
            <input type="text" name="product_qty" class="form-control" required="">
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
                <input type="text" name="product_tags_en" class="form-control" required data-validation-required-message="This field is required" value="" data-role="tagsinput" placeholder="add tags">
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
            <input type="text" name="product_tags_swa" class="form-control" required data-validation-required-message="This field is required" value="" data-role="tagsinput" placeholder="Ongeza Lebo">
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
            <input type="text" name="product_size_en" class="form-control" required data-validation-required-message="This field is required" value="Small,Medium,Large" data-role="tagsinput" placeholder="Add Size Tags">
            @error('product_size_en')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

            <div class="form-group">
                <h5>Product Size in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="product_size_swa" class="form-control" required data-validation-required-message="This field is required" value="Ndogo, Kati, Kubwa" data-role="tagsinput" placeholder="Ongeza Lebo za Ukubwa">
                    @error('product_size_swa')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>
            </div>

        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 4th row --}}






        <div class="row"> {{-- start 5th row  --}}
            <div class="col-md-4">
    <div class="form-group">
        <h5>Product Color in English <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_color_en" class="form-control" required data-validation-required-message="This field is required" value="Red,Black,White" data-role="tagsinput" placeholder="Add Color Tags">
            @error('product_color_en')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

            </div>   {{-- end col-md-4 --}}

            <div class="col-md-4">

    <div class="form-group">
        <h5>Product Color in Swahili <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_color_swa" class="form-control" required data-validation-required-message="This field is required" value="Nyekundu,Nyeusi,Nyeupe" data-role="tagsinput" placeholder="Ongeza Lebo za Rangi">
            @error('product_color_swa')
            <span class="text-danger">{{ $message }}</span>

            @enderror
            </div>
    </div>

        </div>   {{-- end col-md-4 --}}

        <div class="col-md-4">

            <div class="form-group">
                <h5>Product Selling Price <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="selling_price" class="form-control" required data-validation-required-message="This field is required">
                    @error('selling_price')
                    <span class="text-danger">{{ $message }}</span>

                    @enderror
                    </div>
            </div>
        </div>   {{-- end col-md-4 --}}

        </div>   {{-- end 5th row --}}









        <div class="row"> {{-- start 6th row  --}}
            <div class="col-md-4">
    <div class="form-group">
        <h5>Product Discount Price <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="discount_price" class="form-control">

            </div>
    </div>

    </div>   {{-- end col-md-4 --}}

    <div class="col-md-4">

            <div class="form-group">
                <h5>Product Main Thumbnail <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="product_thumbnail" class="form-control" required data-validation-required-message="This field is required" onchange="mainThumbUrl(this)">
                    @error('product_thumbnail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <img src="" id="mainThmb">
                    </div>
            </div>

    </div>   {{-- end col-md-4 --}}

    <div class="col-md-4">
            <div class="form-group">
                <h5>Product Images <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" name="multi_img[]" class="form-control" required data-validation-required-message="This field is required" multiple="" id="multiImg" >
                    @error('multi_img')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row" id="preview_img" >

                    </div>
                    </div>
            </div>

    </div>   {{-- end col-md-4 --}}

    </div>   {{-- end 6th row --}}






            <div class="row"> {{-- start 7th row  --}}
                <div class="col-md-6">
        <div class="form-group">
            <h5>Product Short Desccription in English <span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="controls">
                    <textarea name="short_description_en" id="textarea" class="form-control" required data-validation-required-message="This field is required" required placeholder="Short Description"></textarea>
                </div>

                </div>
        </div>

                </div>   {{-- end col-md-6 --}}

    <div class="col-md-6">

            <div class="form-group">
                <h5>Product Short Desccription in Swahili <span class="text-danger">*</span></h5>
                <div class="controls">
                    <div class="controls">
                        <textarea name="short_description_swa" id="textarea" class="form-control" required data-validation-required-message="This field is required" required placeholder="Maelezo Fupi"></textarea>
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
            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
            <label for="checkbox_2">Hot Deals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="checkbox_3" name="featured" value="1">
            <label for="checkbox_3">Featured Products</label>
        </fieldset>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">

        <div class="controls">
    <fieldset>
        <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
        <label for="checkbox_4">Special Offer</label>
    </fieldset>
    <fieldset>
        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
        <label for="checkbox_5">Special Deals</label>
    </fieldset>
        </div>
    </div>
</div>
</div>
</div>
<div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Add Product">
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
