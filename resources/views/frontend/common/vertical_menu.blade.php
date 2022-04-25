@php
 $categories=App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>
@if (session()->get('language') == 'Kiswahili')Kategoria @else Categories @endif
      </div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
          @foreach ($categories as $category)



        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{$category->category_icon}}" aria-hidden="true"></i>
@if (session()->get('language') == 'Kiswahili'){{$category->category_name_swa}} @else {{$category->category_name_en}} @endif
          </a>
          <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
              {{-- get subcategories table data --}}
  @php
$subcategories=App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
  @endphp
                  @foreach ($subcategories as $subcategory )

                <div class="col-sm-12 col-md-3">
                    <a href="{{url('product/subcat/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en)}}">

  <h2 class="title">
      @if (session()->get('language') == 'Kiswahili'){{$subcategory->subcategory_name_swa}} @else {{$subcategory->subcategory_name_en}} @endif
                      </h2></a>


   {{-- get sub-subcategories table data --}}
   @php
$sub_subcategories=App\Models\SubSubCategory::where('sub_category_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
  @endphp

              @foreach ($sub_subcategories as $sub_subcategory)
                  <ul class="links list-unstyled">
                    <li><a href="{{url('product/subsubcat/'.$sub_subcategory->id.'/'.$sub_subcategory->subsubcategory_slug_en)}}">
   @if (session()->get('language') == 'Kiswahili'){{$sub_subcategory->subsubcategory_name_swa}} @else {{$sub_subcategory->subsubcategory_name_en}} @endif
                     </a></li>

                  </ul>
                  @endforeach
                </div>
                <!-- /.col -->
                @endforeach



              </div>
              <!-- /.row -->
            </li>
            <!-- /.yamm-content -->
          </ul>
          <!-- /.dropdown-menu --> </li>

        <!-- /.menu-item -->
        @endforeach {{-- end category foreach --}}



        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a>
          <!-- ================================== MEGAMENU VERTICAL ================================== -->
          <!-- /.dropdown-menu -->
          <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
        <!-- /.menu-item -->

        <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a>
          <!-- /.dropdown-menu --> </li>
        <!-- /.menu-item -->

      </ul>
      <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
  </div>
  <!-- /.side-menu -->
