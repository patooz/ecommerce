@php
    $testimonials = App\Models\Testimonials::latest()->get();
@endphp

  <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">

        @foreach ($testimonials as $item)

      <div class="item">
        <div class="avatar"><img src="{{asset($item->image)}}" alt="Image"></div>
        <div class="testimonials"><em>"</em> @if (session()->get('language') == 'Kiswahili') {{$item->description_swa}} @else {{$item->description_en}} @endif<em>"</em></div>
        <div class="clients_author">{{$item->name}} <span>{{$item->company}}</span> </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.item -->
      @endforeach

    </div>
    <!-- /.owl-carousel -->
  </div>

