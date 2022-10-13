@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();

@endphp





<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 217px;">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset ('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Ndonyo</b> Shop</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{($route=='admin.dashboard') ? 'active' : ''}}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix=='/brand' ? 'active' : '') }} ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="{{($route=='all.brands') ? 'active' : ''}}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>All Brands</a></li>

          </ul>
        </li>

        <li class="treeview {{ ($prefix=='/category' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route=='all.categories') ? 'active' : ''}}"><a href="{{route('all.categories')}}"><i class="ti-more"></i>All Categories</a></li>

            <li class="{{($route=='all.subcategories') ? 'active' : ''}}"><a href="{{route('all.subcategories')}}"><i class="ti-more"></i>All Subcategories</a></li>

            <li class="{{($route=='all.subsubcategories') ? 'active' : ''}}"><a href="{{route('all.subsubcategories')}}"><i class="ti-more"></i>Sub Subcategories</a></li>

          </ul>
        </li>

        <li class="treeview {{ ($prefix=='/product' ? 'active' : '') }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route=='add.product') ? 'active' : ''}}"><a href="{{route ('add.product')}}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{($route=='manage.products') ? 'active' : ''}}"><a href="{{route ('manage.products')}}"><i class="ti-more"></i>Manage Products</a></li>

          </ul>
        </li>

        <li class="treeview {{ ($prefix=='/slider' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Slider</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='manage.slider') ? 'active' : ''}}"><a href="{{route ('manage.slider')}}"><i class="ti-more"></i>Manage Slider</a></li>

            </ul>
          </li>

          <li class="treeview {{ ($prefix=='/coupons' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Coupons</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='manage.coupon') ? 'active' : ''}}"><a href="{{route ('manage.coupon')}}"><i class="ti-more"></i>Manage Coupons</a></li>

            </ul>
          </li>

          <li class="treeview {{ ($prefix=='/shipping' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Shipping Area</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='manage.county') ? 'active' : ''}}"><a href="{{route ('manage.county')}}"><i class="ti-more"></i>County</a></li>


              <li class="{{($route=='manage.subcounty') ? 'active' : ''}}"><a href="{{route ('manage.subcounty')}}"><i class="ti-more"></i>Subcounty</a></li>


              <li class="{{($route=='manage.ward') ? 'active' : ''}}"><a href="{{route ('manage.ward')}}"><i class="ti-more"></i>Ward</a></li>

            </ul>


          </li>


        <li class="header nav-small-cap">User Interface</li>



        <li class="treeview {{ ($prefix=='/orders' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='pending.orders') ? 'active' : ''}}"><a href="{{route ('pending.orders')}}"><i class="ti-more"></i>Pending Orders</a></li>

              <li class="{{($route=='confirmed.orders') ? 'active' : ''}}"><a href="{{route ('confirmed.orders')}}"><i class="ti-more"></i>Confirmed Orders</a></li>


              <li class="{{($route=='processing.orders') ? 'active' : ''}}"><a href="{{route ('processing.orders')}}"><i class="ti-more"></i>Processing Orders</a></li>


              <li class="{{($route=='picked.orders') ? 'active' : ''}}"><a href="{{route ('picked.orders')}}"><i class="ti-more"></i>Picked Orders</a></li>

               <li class="{{($route=='shipped.orders') ? 'active' : ''}}"><a href="{{route ('shipped.orders')}}"><i class="ti-more"></i>Shipped Orders</a></li>

               <li class="{{($route=='delivered.orders') ? 'active' : ''}}"><a href="{{route ('delivered.orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>

               <li class="{{($route=='canceled.orders') ? 'active' : ''}}"><a href="{{route ('canceled.orders')}}"><i class="ti-more"></i>Canceled Orders</a></li>


            </ul>


          </li>



		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>


      </ul>
      </div>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
