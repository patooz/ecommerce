@php
    $tags_en=App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_swa=App\Models\Product::groupBy('product_tags_swa')->select('product_tags_swa')->get();
@endphp


 <div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">



      <div class="tag-list">

        @if (session()->get('language') == 'Kiswahili')

        @foreach ($tags_swa as $item)
        <a class="item active" title="Phone" href="{{url('product/tag/'.$item->product_tags_swa)}}" target="_blank">{{ str_replace(',',' ',$item->product_tags_swa) }}</a>
        @endforeach


        @else
        @foreach ($tags_en as $item)
        <a class="item active" title="Phone" href="{{url('product/tag/'.$item->product_tags_en)}}" target="_blank">{{ str_replace(',',' ',$item->product_tags_en)  }}</a>
        @endforeach


        @endif


    </div>
      <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>
