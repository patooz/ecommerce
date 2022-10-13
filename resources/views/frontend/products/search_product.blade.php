

<style>
	
	body{

  background-color: #eee; 
}

.card{

  background-color: #fff;
  padding: 15px;
  border:none;
}

.input-box{
  position: relative;
}

.input-box i {
  position: absolute;
  right: 13px;
  top:15px;
  color:#ced4da;

}

.form-control{

  height: 50px;
  background-color:#eeeeee69;
}

.form-control:focus{
  background-color: #eeeeee69;
  box-shadow: none;
  border-color: #eee;
}


.list{

  padding-top: 20px;
  padding-bottom: 10px;
  display: flex;
  align-items: center;

}

.border-bottom{

  border-bottom: 2px solid #eee;
}

.list i{
  font-size: 19px;
  color: red;
}

.list small{

  color:#483d8b;
}
</style>

@if($products->isEmpty())
<h4 class="text-danger text-center" >Product not Found</h4>

@else


<div class="container mt-5">

          <div class="row d-flex justify-content-center ">

            <div class="col-md-6">

                <div class="card">
                  
                 
                	@foreach($products as $item)
                	<a href="{{url('item/details/'.$item->id.'/'.$item->product_slug_en)}}">
                  <div class="list border-bottom">
                    <img src="{{asset($item->product_thumbnail)}}" style="width: 30px; height: 30px;" alt=""> 
                    <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
                      <span>{{$item->product_name_en}}</span> 
                      <small> <b>Ksh {{number_format($item->selling_price,2,'.',',')}}</b> </small>
                    </div>                   
                  </div></a>
                  @endforeach


                </div>
              
            </div>
            
          </div>
          
        </div>
        @endif