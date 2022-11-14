<!DOCTYPE html>
<html lang="en">
@php
    $sitesettings=App\Models\SeoModel::find(1);
@endphp
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{$sitesettings->meta_description}}">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="author" content="{{$sitesettings->meta_author}}">
<meta name="keywords" content="{{$sitesettings->meta_keyword}}">
<meta name="robots" content="all">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<!-- Google Analytics Code -->
<script>

    {{$sitesettings->google_analytics}}

</script>

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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<script src="https://js.stripe.com/v3/"></script>
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
<script src="{{asset ('frontend/assets/js/v3.js')}}"></script>
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
            url:'/ecomm/product/view/modal/'+id,
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
            url: "/ecomm/store/cart/data/"+id,
            success:function (data) {
                miniCart()
                $('#closeModel').click();
                // console.log(data);


                // start sweetalert message
                const Toast=Swal.mixin({
                        // toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
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

                    // end sweetalert message



            }

        })

    }

    //add to cart end product

  </script>

  <script>
      function miniCart() {
          $.ajax({
              type: 'GET',
              url: '/ecomm/product/mini/cart',
              dataType: 'json',
              success: function (response) {
                //   console.log(response);
                $('span[id="cartSubtotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart=''
                $.each(response.cart, function (key,value) {
                    miniCart += `<div class="cart-item product-summary">
                            <div class="row">
                            <div class="col-xs-4">
                                <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                            </div>
                            <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price">Ksh ${value.price}  (${value.qty}) </div>
                            </div>
                            <div class="col-xs-1 action">
                                 <button type="submit" id="${value.rowId}" onClick="removeMiniCart(this.id)" ><i class="fa fa-trash"></i></button>
                                 </div>
                            </div>
                        </div>
                        <!-- /.cart-item -->
                        <div class="clearfix"></div>
                        <hr>`


                });
                $('#miniCart').html(miniCart);

              }
          })

      }

      miniCart();

      //remove items from minicart start

      function removeMiniCart(rowId) {
        $.ajax({
            type: 'GET',
            url: '/ecomm/mini/cart/product-remove/'+rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();

                //start sweetalert message

                const Toast=Swal.mixin({
                        // toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
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
                //end sweetalert message

            }
        })
      }
      //remove items from minicart end

  </script>


{{-- add to wishlist start--}}

<script>
    function addToWishList(productId) {
        $.ajax({
            type: 'POST',
            url: '/ecomm/add-to-wishlist/'+productId,
            dataType: 'json',

            success: function (data) {

                //start sweetalert message

                const Toast=Swal.mixin({
                        // toast: true,
                        position: 'center',

                        showConfirmButton: true,

                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                //end sweetalert message

                redire

            }

        })

    }
</script>

{{-- add to wishlist end--}}

{{-- load wishlist data start --}}

<script>
    function Wishlist() {
          $.ajax({
              type: 'GET',
              url: '/ecomm/user/get-wishlist-item',
              dataType: 'json',
              success: function (response) {
                //   console.log(response);

                var rows=''
                $.each(response, function (key,value) {
                    rows += `<tr>
					<td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

						<div class="price">

                            ${value.product.discount_price == null
                                ? `Ksh ${value.product.selling_price }`
                                :
                                `Ksh ${value.product.discount_price }
                                <span>Ksh ${value.product.selling_price }</span>
                                `
                            }

						</div>
					</td>
					<td class="col-md-2">

                        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)">  <i class="fa fa-shopping-cart"></i> ADD TO CART </button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.id}" onClick="RemoveWishlistItem(this.id)" class="btn btn-danger"><i class="fa fa-times"></i></button>
					</td>
				</tr>`


                });
                $('#wishlist').html(rows);

              }
          })

      }

      Wishlist();

      //remove wishlist item start

      function RemoveWishlistItem(id) {
        $.ajax({
            type: 'GET',
            url: '/ecomm/user/remove-wishlist-item/'+id,
            dataType: 'json',
            success: function (data) {
                Wishlist();

                //start sweetalert message

                const Toast=Swal.mixin({
                        // toast: true,
                        position: 'center',
                        showConfirmButton: true,

                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                //end sweetalert message

            }
        })
      }
      //remove wishlist item end



</script>


{{-- end wishlist data --}}



{{-- load my cart data start --}}

<script>
    function cart() {
          $.ajax({
              type: 'GET',
              url: '/ecomm/user/get-cart-item',
              dataType: 'json',
              success: function (response) {
                //   console.log(response);

                var rows=''
                $.each(response.cart, function (key,value) {
                    rows += `<tr>
					<td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="width: 100px; height: 100px;"></td>
					<td class="col-md-2">
						<div class="product-name"><a href="#">${value.name}</a></div>

						<div class="price">


                               Ksh ${value.price }



						</div>
					</td>


                    <td class="col-md-2">
                        <strong>${value.options.color }</strong>

					</td>

                    <td class="col-md-2">
                        ${value.options.size == null
                            ?`<span></span>`
                            : `<strong>${value.options.size }</strong>`
                         }

					</td>

                    <td class="col-md-2">
                        ${value.qty > 1
                            ? `<button type="submit" class="btn btn-warning btn sm" id="${value.rowId}" onClick="decreaseCart(this.id)">-</button>`

                            : `<button type="submit" class="btn btn-warning btn sm" disabled>-</button>`
                         }




                        <input type="text" value="${value.qty }" min="1" max="100" disabled="" style="width:25px; height:25px;">
                        <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onClick="increaseCart(this.id)">+</button>

					</td>

                    <td class="col-md-2 price">
                        Ksh  ${value.subtotal}

					</td>


					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.rowId}" onClick="RemoveCart(this.id)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
					</td>
				</tr>`


                });
                $('#cartPage').html(rows);

              }
          })

      }

      cart();

      //remove cart item start

      function RemoveCart(id) {
        $.ajax({
            type: 'GET',
            url: '/ecomm/user/remove-cart-item/'+id,
            dataType: 'json',
            success: function (data) {
                couponCalc();
                cart();
                miniCart();
                $('#couponField').show();
                $('#coupon_name').val('');

                //start sweetalert message

                const Toast=Swal.mixin({
                        // toast: true,
                        position: 'center',
                        showConfirmButton: true,


                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                //end sweetalert message

            }
        })
      }
      //remove cart item end


      //increase cart start

      function increaseCart(rowId) {
          $.ajax({
            type: 'GET',
            url: '/ecomm/user/increase-cart/'+rowId,
            dataType: 'json',
            success:function(data){
                couponCalc();
                cart();
                miniCart();

            }
          })
      }


      //increase cart end


      //decrease cart start

      function decreaseCart(rowId) {
          $.ajax({
            type: 'GET',
            url: '/ecomm/user/decrease-cart/'+rowId,
            dataType: 'json',
            success:function(data){
                couponCalc();
                cart();
                miniCart();

            }
          })
      }


      //decrease cart end



</script>


{{-- apply coupon start: --}}
<script>

function applyCoupon(params) {
    var coupon_name=$('#coupon_name').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "{{url('/ecomm/apply-coupon') }}",
        success: function (data) {
            couponCalc();
            if (data.validity==true) {
                $('#couponField').hide();



            }



            //start sweetalert message


            const Toast=Swal.mixin({
                        // toast: true,
                        position: 'center',
                        showConfirmButton: true,

                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                //end sweetalert message

        }
    })
}

function couponCalc() {
    $.ajax({
        type: 'GET',
        url: "{{ url('/ecomm/coupon-calculation') }}",
        dataType : 'json',
        success: function (data) {

            if (data.total) {
                $('#couponCalcField').html(
                    `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">Ksh ${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">Ksh ${data.total}</span>
					</div>
				</th>
			</tr>`
                )

            } else {

                $('#couponCalcField').html(
                    `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">Ksh ${data.sub_total}</span>
					</div>

                    <div class="cart-sub-total">

						Coupon
                        <button type="submit" title="Remove Coupon" onClick="removeCoupon()"> <i class="fa fa-times"></i> </button >
                        <span class="inner-left-md">${data.coupon_name}</span>

					</div>

                    <div class="cart-sub-total">
						Discount Amount<span class="inner-left-md">Ksh ${data.discount_amount}</span>
					</div>

					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">Ksh ${data.total_amount}</span>
					</div>
				</th>
			</tr>`
                )

            }

        }
    });
}
couponCalc();


</script>
{{-- apply coupon end: --}}


{{-- end my cart data --}}

{{-- remove coupon start: --}}
<script>
    function removeCoupon() {
        $.ajax({
        type: 'GET',
        url: "{{ url('/ecomm/remove-coupon') }}",
        dataType : 'json',
        success: function (data) {
            couponCalc();
            $('#couponField').show();
            $('#coupon_name').val('');

            //start sweetalert message
            const Toast=Swal.mixin({
                        // toast: true,
                        position: 'center',
                        showConfirmButton: true,

                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }
                //end sweetalert message


        }
    });

    }
</script>

{{-- remove coupon end: --}}

<script src="{{ asset('frontend/assets/js/code.js') }}"></script>
</body>
</html>


