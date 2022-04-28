




<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="#"><i class="icon fa fa-user"></i>
@if (session()->get('language') == 'Kiswahili') Akaunti Yangu @else My Account @endif
                </a></li>
            <li><a href="#"><i class="icon fa fa-heart"></i>
                @if (session()->get('language') == 'Kiswahili')
                Matamanio

                @else
                Wishlist
                @endif
                </a></li>
            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>
 @if (session()->get('language') == 'Kiswahili')Mkokoteni Wangu @else My Cart @endif
                </a></li>
            <li><a href="#"><i class="icon fa fa-check"></i>
@if (session()->get('language') == 'Kiswahili') Lipa @else Checkout @endif
                </a></li>

            @auth
            <li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>
                @if (session()->get('language') == 'Kiswahili')
                Wasifu Wangu

                @else
                My Profile
                @endif
                </a></li>
            @else
        <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
            @if (session()->get('language') == 'Kiswahili')
            Ingia au Jiandikishe

                @else
                Login or Register
                @endif
            </a></li>

            <li><a href="{{ route('admin.login') }}" target="_blank"><i class="icon fa fa-user" ></i>
                @if (session()->get('language') == 'Kiswahili')
                Kiingilio Cha Wakubwa

                    @else
                    Admin Login
                    @endif
                </a></li>

            @endauth

          </ul>
        </div>
        <!-- /.cnt-account -->

        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                @if (session()->get('language') == 'Kiswahili')
                Lugha

                @else
                Languages
                @endif
                </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                  @if (session()->get('language') == 'Kiswahili')
                  <li><a href="{{ route('en.language') }}">English</a></li>

                  @else
                  <li><a href="{{ route('swa.language') }}">Kiswahili</a></li>

                  @endif

              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled -->
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.header-top -->
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
          <!-- /.logo -->
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->

        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
          <!-- /.contact-row -->
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form>
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
                      <li class="menu-header">Computer</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>
            </form>
          </div>
          <!-- /.search-area -->
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->

        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">



          <!-- ==================================== SHOPPING CART DROPDOWN ====================================== -->

          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price">
                  <span class="sign">Ksh</span><span class="value" id="cartSubtotal"></span> </span>
                 </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
               {{-- mini cart start --}}

                <div id="miniCart">

                </div>

                {{-- mini cart end --}}

                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span>
                    <span class="sign"><strong>Ksh</strong> </span> <span class='price' id="cartSubtotal"> </span>
                 </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                 </div>
                <!-- /.cart-total-->

              </li>
            </ul>
            <!-- /.dropdown-menu-->
          </div>
          <!-- /.dropdown-cart -->

          <!-- =========================== SHOPPING CART DROPDOWN : END=============================-->



        </div>
        <!-- /.top-cart-row -->
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.main-header -->

  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{url ('/')}}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
 @if (session()->get('language') == 'Kiswahili')Nyumbani @else Home @endif
                     </a> </li>
                    {{-- get categories table data --}}
                @php
                    $categories=App\Models\Category::orderBy('category_name_en','ASC')->get();
                @endphp



        @foreach ($categories as $category)
    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
        @if (session()->get('language') == 'Kiswahili'){{$category->category_name_swa}} @else {{$category->category_name_en}} @endif
        </a>
        <ul class="dropdown-menu container">
        <li>
            <div class="yamm-content ">
            <div class="row">

                {{-- get subcategories table data --}}
                @php
                $subcategories=App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
            @endphp

            @foreach ($subcategories as $subcategory )



                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                    <a href="{{url('product/subcat/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">
                <h2 class="title">
    @if (session()->get('language') == 'Kiswahili'){{$subcategory->subcategory_name_swa}} @else {{$subcategory->subcategory_name_en}} @endif
                    </h2></a>

                     {{-- get sub-subcategories table data --}}
                @php
                $sub_subcategories=App\Models\SubSubCategory::where('sub_category_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
            @endphp

                @foreach ($sub_subcategories as $sub_subcategory )

                <ul class="links">
                    <li><a href="{{url('product/subsubcat/'.$sub_subcategory->id.'/'.$sub_subcategory->subsubcategory_slug_en)}}">
@if (session()->get('language') == 'Kiswahili'){{$sub_subcategory->subsubcategory_name_swa}} @else {{$sub_subcategory->subsubcategory_name_en}} @endif
                        </a></li>
                </ul>
                @endforeach  {{-- end sub-subcategory foreach loop --}}

                </div>
                <!-- /.col -->
                @endforeach



                <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}" alt=""> </div>
                <!-- /.yamm-content -->
            </div>
            </div>
        </li>
        </ul>
    </li>
    @endforeach

    <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer -->
          </div>
          <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
      </div>
      <!-- /.navbar-default -->
    </div>
    <!-- /.container-class -->

  </div>
  <!-- /.header-nav -->
  <!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
