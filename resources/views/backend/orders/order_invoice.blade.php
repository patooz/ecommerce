<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Ndonyo Online Shop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Ndonyo Online shop Head Office
               Email:support@ndonyoshop.co.ke <br>
               Mobile: +254701234567 <br>
               P.O BOX 30400-587 <br>
               Kabarnet, Kenya.

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{$order->name}} <br>
           <strong>Email:</strong> {{$order->email}} <br>
           <strong>Phone:</strong> {{$order->phone}} <br>

           @php
               $county=$order->county->county_name;
               $subcounty=$order->subcounty->subcounty_name;
               $ward=$order->ward->ward_name;
           @endphp

           <strong>Address:</strong> {{$county}},{{$subcounty}}.{{$ward}} <br>
           <strong>Post Code:</strong> {{$order->postal_code}}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{ $order->invoce_no }}</h3>
            Order Date: {{$order->order_date}} <br>
             Delivery Date: {{$order->delivery_date}} <br>
            Payment Type : {{$order->payment_method}} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

        @foreach ($orderItem as $item)


      <tr class="font">
        <td align="center">
            <img src="{{public_path($item->products->product_thumbnail)}} " height="60px;" width="60px;" alt="">
        </td>
        <td align="center">{{$item->products->product_name_en}}</td>
        <td align="center">

            @if ($item->size == NULL)
            ----

            @else
            {{$item->size}}

            @endif

            @if ($item->color == NULL)
            ----

            @else
            {{$item->color}}

            @endif

        </td>
        <td align="center">{{$item->color}}</td>
        <td align="center">{{$item->products->product_code}}</td>
        <td align="center">{{$item->qty}}</td>
        <td align="center">Ksh {{$item->price}}</td>
        <td align="center">Ksh {{$item->price * $item->qty}}</td>
      </tr>
      @endforeach

    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span> Ksh {{$order->amount}}</h2>
            <h2><span style="color: green;">Total:</span> Ksh {{$order->amount}}</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Our Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
