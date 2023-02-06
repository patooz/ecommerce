@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();

@endphp





<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        {{-- <div class="slimScrollDiv" style="position: relative; overflow: hidden; "> --}}

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

        @php

        $brand = (auth()->guard('admin')->user()->brand == 1);
        $category = (auth()->guard('admin')->user()->category == 1);
        $product = (auth()->guard('admin')->user()->product == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $users = (auth()->guard('admin')->user()->users == 1);
        $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $settings = (auth()->guard('admin')->user()->settings == 1);
        $adminuser = (auth()->guard('admin')->user()->adminuser == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $testimonials = (auth()->guard('admin')->user()->testimonials == 1);


        @endphp


        @if($brand == true)
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
        @else
        @endif

        @if($category == true)
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
        @else
        @endif

        @if($product == true)
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
        @else
        @endif

        @if($slider == true)
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
          @else
        @endif


        @if($testimonials == true)
        <li class="treeview {{ ($prefix=='/testimonials' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Testimonials</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='view_testimonials') ? 'active' : ''}}"><a href="{{route ('view_testimonials')}}"><i class="ti-more"></i>View Testimonials</a></li>

            </ul>
          </li>
          @else
        @endif

        @if($coupons == true)
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
           @else
          @endif

          @if($shipping == true)
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
          @else
          @endif

          @if($blog == true)
           <li class="treeview {{ ($prefix=='/blog' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Blog</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='blog_category') ? 'active' : ''}}"><a href="{{route ('blog_category')}}"><i class="ti-more"></i>Blog Category</a></li>

              <li class="{{($route=='view_blog_post') ? 'active' : ''}}"><a href="{{route ('view_blog_post')}}"><i class="ti-more"></i>View Blog Post List</a></li>

               <li class="{{($route=='add_blog_post') ? 'active' : ''}}"><a href="{{route ('add_blog_post')}}"><i class="ti-more"></i>Add Blog Post </a></li>




            </ul>


          </li>
          @else
          @endif




        <li class="header nav-small-cap">User Interface</li>


        @if($orders == true)
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

               <li class="{{($route=='trashed.orders') ? 'active' : ''}}"><a href="{{route ('trashed.orders')}}"><i class="ti-more"></i>Trashed Orders</a></li>



            </ul>


          </li>
          @else
          @endif

          @if($stock == true)
     <li class="treeview {{ ($prefix=='/stock' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Manage Stock</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='product_stock') ? 'active' : ''}}"><a href="{{route ('product_stock')}}"><i class="ti-more"></i>Product Stock</a></li>

            </ul>


          </li>
          @else
          @endif


          @if($reports == true)
		 <li class="treeview {{ ($prefix=='/reports' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='view_reports') ? 'active' : ''}}"><a href="{{route ('view_reports')}}"><i class="ti-more"></i>All Reports</a></li>

            </ul>


          </li>
          @else
          @endif

          @if($users == true)
           <li class="treeview {{ ($prefix=='/users' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='view_users') ? 'active' : ''}}"><a href="{{route ('view_users')}}"><i class="ti-more"></i>View Users</a></li>

            </ul>


          </li>
          @else
          @endif

           @if($adminuser == true)
           <li class="treeview {{ ($prefix=='/adminroles' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Admin User Roles</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='admin_users') ? 'active' : ''}}"><a href="{{route ('admin_users')}}"><i class="ti-more"></i>All Admin Users</a></li>

            </ul>


          </li>
          @else
          @endif

          @if($returnorder == true)
            <li class="treeview {{ ($prefix=='/return' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Return Order Requests</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='all_requests') ? 'active' : ''}}"><a href="{{route ('all_requests')}}"><i class="ti-more"></i>All Requests</a></li>

               <li class="{{($route=='approved_returned_requests') ? 'active' : ''}}"><a href="{{route ('approved_returned_requests')}}"><i class="ti-more"></i>Approved Returned Requests</a></li>


            </ul>


          </li>
          @else
          @endif

          @if($review == true)
          <li class="treeview {{ ($prefix=='/review' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Manage Reviews</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='pending_reviews') ? 'active' : ''}}"><a href="{{route ('pending_reviews')}}"><i class="ti-more"></i>Pending Reviews</a></li>

               <li class="{{($route=='approved_reviews') ? 'active' : ''}}"><a href="{{route ('approved_reviews')}}"><i class="ti-more"></i>Approved Reviews</a></li>


            </ul>


          </li>
          @else
          @endif

          @if($settings == true)
          <li class="treeview {{ ($prefix=='/settings' ? 'active' : '') }}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Manage Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="{{($route=='site_setting') ? 'active' : ''}}"><a href="{{route ('site_setting')}}"><i class="ti-more"></i>All Request</a></li>

               <li class="{{($route=='seo_setting') ? 'active' : ''}}"><a href="{{route ('seo_setting')}}"><i class="ti-more"></i>SEO Settings</a></li>


            </ul>


          </li>
          @else
          @endif





      </ul>
      {{-- </div> --}}
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
