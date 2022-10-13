@extends('frontend.main_master')
@section('content')

@section('title')
Blog
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
              @foreach($blogPost as $item)

              <div class="blog-post  wow fadeInUp">
    <a href="{{route('blog_post_details', $item->id)}}"><img class="img-responsive" src="{{asset($item->post_image)}}" alt=""></a>
    <h1><a href="{{route('blog_post_details', $item->id)}}"> @if (session()->get('language') == 'Kiswahili'){{$item->post_title_swa}} @else {{$item->post_title_en}} @endif</a></h1>
    <span class="author">John Doe</span>
    <span class="review">6 Comments</span>
    <span class="date-time">{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</span>
    <p>@if (session()->get('language') == 'Kiswahili'){!!Str::limit($item->post_details_swa, 300)!!} @else {!!Str::limit($item->post_details_en, 300)!!} @endif</p>
    <a href="{{route('blog_post_details', $item->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
</div>
              
              @endforeach      
    


<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
                        
    <div class="text-right">
         <div class="pagination-container">
    <ul class="list-inline list-unstyled">
        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
        <li><a href="#">1</a></li>  
        <li class="active"><a href="#">2</a></li>   
        <li><a href="#">3</a></li>  
        <li><a href="#">4</a></li>  
        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

</div><!-- /.filters-container -->              </div>
                <div class="col-md-3 sidebar">
                
                
                
                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>      

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
</div>


 <!-- =========================CATEGORY============================ -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">Blog Category</h3>
    <div class="sidebar-widget-body m-t-10">
        <div class="accordion">
            
            @foreach($blogCategory as $item)
            
                <ul class="list-group">
                    
                    <a href="{{route('blog_post_category',$item->id)}}"> <li class="list-group-item">@if (session()->get('language') == 'Kiswahili'){{$item->blog_category_name_swa}} @else {{$item->blog_category_name_eng}} @endif</li>
                       
                    </a>
                   
                </ul>
           
             @endforeach

            

        </div><!-- /.accordion -->
    </div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
    <!-- ============================ CATEGORY : END ========================================== -->                       
<!-- ============================================== PRODUCT TAGS ================================== -->
@include('frontend.common.product_tags')
<!-- ============================================== PRODUCT TAGS : END ============================================== -->                   </div>
                </div>
            </div>
        </div>
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div>








@endsection


