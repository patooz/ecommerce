

@extends('admin.admin_master')
@section('admin')





<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Hover Export Data Table</h3>
      <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <form method="get" action="{{ route('edit.product',$products->id) }}" >
          <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
            <thead>
                <tr style="width: 100%">
                    <th>Product Name in English</th>
                    <th>Product Name in Swahili</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Sub-Subcategory</th>
                    <th>Product Code</th>
                    <th>Product Quantity</th>
                    <th>Product Tags in English</th>
                    <th>Product Tags in Swahili</th>
                    <th>Product Size in English</th>
                    <th>Product Size in Swahili</th>
                    <th>Product Color in English</th>
                    <th>Product Color in Swahili</th>
                    <th>Product Selling Price</th>
                    <th>Product Discount Price</th>
                    <th>Product Short Desccription in English</th>
                    <th>Product Short Desccription in Swahili</th>
                    <th>Product Long Description in English</th>
                    <th>Product Long Description in Swahili</th>
                </tr>
            </thead>
            <tbody>

                <tr>

                    <td> {{ $products->product_name_en }}</td>
                    <td> {{ $products->product_name_swa }} </td>
                    <td>{{$brands->brand_name_en}}</td>
                    <td> {{ $categories->category_name_en }}</td>
                    <td>{{ $subcategories->subcategory_name_en }}</td>
                    <td>{{ $subsubcategories->subsubcategory_name_en }}</td>
                    <td>{{ $products->product_code }}</td>
                    <td>{{ $products->qty }}</td>
                    <td> {{ $products->product_tags_en }}</td>
                    <td> {{ $products->product_tags_swa }}</td>
                    <td> {{ $products->product_size_en }}</td>
                    <td> {{ $products->product_size_swa }}</td>
                    <td>  {{ $products->product_color_en }}</td>
                    <td>{{ $products->product_color_swa }}</td>
                    <td>Ksh {{ $products->selling_price }}</td>
                    <td> Ksh {{ $products->discount_price }}</td>
                    <td> {{ $products->short_description_en }}</td>
                    <td>{{ $products->short_description_swa }}</td>
                    <td> {!!$products->long_description_en!!}</td>
                    <td>{!!$products->long_description_swa!!}</td>

                </tr>



            </tbody>
            <tfoot>
                <tr>
                    <th>Product Name in English</th>
                    <th>Product Name in Swahili</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Sub-Subcategory</th>
                    <th>Product Code</th>
                    <th>Product Quantity</th>
                    <th>Product Tags in English</th>
                    <th>Product Tags in Swahili</th>
                    <th>Product Size in English</th>
                    <th>Product Size in Swahili</th>
                    <th>Product Color in English</th>
                    <th>Product Color in Swahili</th>
                    <th>Product Selling Price</th>
                    <th>Product Discount Price</th>
                    <th>Product Short Desccription in English</th>
                    <th>Product Short Desccription in Swahili</th>
                    <th>Product Long Description in English</th>
                    <th>Product Long Description in Swahili</th>
                </tr>
            </tfoot>
        </table>
        </div>

    </div>
    <!-- /.box-body -->

    <hr>

    <div class="row" >
    <div class="col-sm-6">
        <div class="card">

            <div class="card-body" >
            <fieldset>

                <label for="checkbox_2"> <h4>Hot Deals:</h4> </label>
                {{$products->hot_deals == 1 ? 'Checked' : 'Not Checked'}}
            </fieldset>
            <fieldset>

                <label for="checkbox_3"><h4> Featured Products:</h4></label>
                {{$products->featured == 1 ? 'Checked' : 'Not Checked'}}
            </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

            <div class="card-body">
        <fieldset>

            <label for="checkbox_4"><h4>Special Offer:</h4></label>
             {{$products->special_offer == 1 ? 'Checked' : 'Not Checked'}}
        </fieldset>
        <fieldset>

            <label for="checkbox_5"><h4>Special Deals:</h4></label>
             {{$products->special_deals == 1 ? 'Checked' : 'Not Checked'}}
        </fieldset>
            </div>
        </div>
    </div>
    </div>



  </div>
  <!-- /.box -->
  <div class="text-xs-right">
    <input type="submit" class="btn btn-rounded btn-primary mb-5 " value="Edit Product">
</div>
</form>





   @endsection
