@extends('user_template.layouts.template')
@section('main-content')
<h1>Final Step To Place Your Order</h1>
<div class="row mb-4">
    <div class="col-8">
        <div class="box_main">
         <h3>Product Will Send At:</h3>  
         <p>City Name:-{{ $shipping_address->city }}</p>
         <p>Postal Code:-{{ $shipping_address->postal_code }}</p>
         <p>phone number:-{{ $shipping_address->phone_number }}</p>
        </div>
    </div>
    <div class="col-4">
        <div class="box_main">
            <h3>Your Final Product Are:</h3>
            <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                  @php
                      $total=0;
                  @endphp
                  @foreach ($cart_item as $item)
                  <tr>
                    @php
                        $product_name=App\Models\Product::where('id',$item->id)->value('product_name');
                    @endphp
                    <th>{{ $product_name }}</th>
                    <th>{{ $item->quantity }}</th>
                    <th>{{ $item->price }}</th>
                  </tr>
                  @php
                      $total=$total+$item->price;
                  @endphp                         
                  @endforeach
                  <tr>
                    <td></td>
                    <td>total</td>
                    <td>{{ $total }}</td>
                  </tr> 
                </table>
              </div>
            </div>
        </div>
        <form action="" method="post">
        @csrf
        <input type="submit" class="btn btn-danger mr-3" value="cancel order">
        </form>
       <form action="{{ route('placeorder') }}" method="post">
        @csrf
        <input type="submit" class="btn btn-primary" value="place order">
          
        </form>
      </div>
     @endsection