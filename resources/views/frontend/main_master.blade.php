<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset ('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset ('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset ('frontend/assets/css/bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset ('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
@include('frontend.body.header')
@include('sweetalert::alert')
@yield('content')
<!-- /#top-banner-and-menu -->

@include('frontend.body.footer')

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset ('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="{{asset ('frontend/text/javascript')}}"></script>
<script src="{{asset ('frontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset ('frontend/assets/js/scripts.js')}}"></script>
<script src="{{asset ('frontend/assets/js/sweetalert2.all.min.js')}}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Add to cart product Modal START -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">

                    <div class="card" style="width: 18rem;">
                        <img src="" class="card-img-top" alt="..." style="height: 220px; width: 200px;" id="pimage" >

                      </div>

                </div>
                {{-- end col md 4 --}}

                <div class="col-md-4">

                    <ul class="list-group">
                        <li class="list-group-item"> Price: <strong class="text-danger" >Ksh <span id="pprice"></span> </strong>
                            <del id="p_oldprice">  Ksh <span>  </span> </del>
                        </li>
                        <li class="list-group-item"> Code: <strong id="pcode"> </strong></li>
                        <li class="list-group-item"> Category: <strong id="pcat"> </strong></li>
                        <li class="list-group-item"> Brand: <strong id="pbrand"> </strong></li>
                        <li class="list-group-item"> Stock: <strong> <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;" ></span>
                            <span class="badge badge-pill badge-danger" id="unavailable" style="background: red; color: white;" ></span>
                        </strong></li>
                      </ul>

                </div>
                {{-- end col md 4 --}}

                <div class="col-md-4">

                    <div class="form-group">
                        <label for="color">Choose Color</label>
                        <select class="form-control" id="color" name="color">


                        </select>
                      </div>

                      <div class="form-group" id="sizeArea">
                        <label for="size">Choose Size</label>
                        <select class="form-control" id="size" name="size">


                        </select>
                      </div>

                      <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" id="qty" value="1" min="1">
                      </div>

                      <div class="col-sm-7">
                          <input type="hidden" id="productId">
                        <button class="btn btn-primary" type="submit" onclick="addToCart()"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                    </div>

                </div>
                {{-- end col md 4 --}}

            </div>
            {{-- end row --}}





        </div>
        {{-- end modal body --}}

      </div>
    </div>
  </div>
  <!--Add to cart product Modal END -->


  <script >
      $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          }
      })

    //  product view with modal start
    function productView(id) {
        // alert(id)
        $.ajax({
            type:'GET',
            url:'/product/view/modal/'+id,
            dataType:'json',
            success: function (data) {
                // console.log(data);

                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcat').text(data.product.categories.category_name_en);
                $('#pbrand').text(data.product.brands.brand_name_en);
                $('#pstock').text(data.product.product_qty);
                $('#pimage').attr('src','/'+data.product.product_thumbnail);


                $('#productId').val(id);
                $('#qty').val(1);


                // product price
                if (data.product.discount_price == null) {

                    $('#pprice').text('');
                    $('#p_oldprice').text('');
                    $('#pprice').text(data.product.selling_price);

                } else {
                    $('#pprice').text(data.product.discount_price);
                    $('#p_oldprice').text(data.product.selling_price);

                } // end product price

                //color
                $('select[name="color"]').empty();
                $.each(data.color, function (key,value) {
                  $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')

                }) //end color

                //// start stock option ////

                if (data.product.product_qty > 0) {

                    $('#available').text('');
                    $('#unavailable').text('');
                    $('#available').text('Available');
                } else {

                    $('#available').text('');
                    $('#unavailable').text('');
                    $('#unavailable').text('Out of Stock');

                }

                //size
                $('select[name="size"]').empty();
                $.each(data.size, function (key,value) {
                  $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')

                  if (data.size == "") {
                      $('#sizeArea').hide();
                  } else {
                    $('#sizeArea').show();

                  }

                }) //end size


            }
        })

    }
    //  product view with modal end


    //add to cart start product

    function addToCart() {
        var product_name=$('#pname').text();
        var id=$('#productId').val();
        var color=$('#color option:selected').text();
        var size=$('#size option:selected').text();
        var quantity=$('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                color:color, size:size, quantity:quantity, product_name:product_name
            },
            url: "/store/cart/data/"+id,
            success:function (data) {
                $('#closeModel').click();
                // console.log(data);

                const Toast=Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }



            }

        })

    }




    //add to cart end product


  </script>

</body>
</html>


