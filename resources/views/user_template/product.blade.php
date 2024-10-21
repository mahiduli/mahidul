@extends('user_template.layouts.template')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="tshirt_img"><img src="{{asset($products->product_img) }}"></div>

            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                <div class="product-info">
                    <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                    <p class="price_text text-left">Price  <span style="color: #262626;">$ {{ $products->price }}</span></p>
                    <div class="my-3 product-details">
                      <p class="lead">{{ $products->product_long_des }}</p>
                         <ul class="my-2 p-2 bg-light">
                            <li>{{ $products->product_category_name }}</li>
                            <li>{{ $products->product_subcategory_name }}</li>
                            <li>{{ $products->quantity }}</li>
                         </ul>
                    </div>
                    <div class="btn_main">
                     <form action="{{ route('addproducttocart') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $products->id }}">
                        <input type="hidden" name="price" value="{{ $products->price }}">
                        <input type="hidden" name="quantity" value="1">
                        <div class="form-group">
                           <label for="product_quantity">How many pics?</label>
                           <input type="number" class="form-control" min="1" placeholder="1" name="quantity">
                           
                        </div>
                        
                        <input class="btn btn-warning" type="submit" value="Add To Cart">
                     </form>
                </div>
       
           </div>
        </div>
    </div>
</div>


<div class="fashion_section">
    <div id="main_slider">
             <div class="container">
                <h1 class="fashion_taital">Related Product</h1>
                <div class="fashion_section_2">
                   <div class="row">

                    @foreach ($related_product as $item)
                    <div class="col-lg-4 col-sm-4">
                       <div class="box_main">
                          <h4 class="shirt_text">{{ $item->product_name }}</h4>
                          <p class="price_text">Price  <span style="color: #262626;">$ {{ $item->price }}</span></p>
                          <div class="tshirt_img"><img src="{{ asset($item->product_img)}}"></div>
                          <div class="btn_main">
                           <form action="{{ route('addproducttocart') }}" method="post">
                              @csrf
                              <input type="hidden" name="product_id" value="{{ $products->id }}">
                              <input type="hidden" name="price" value="{{ $products->price }}">
                              <input type="hidden" name="quantity" value="1">
                              <input class="btn btn-warning" type="submit" value="Buy Now">
                           </form>
                             <div class="seemore_bt"><a href="{{ route('singleproduct',[$item->id,$item->slug]) }}">See More</a></div>
                          </div>
                       </div>
                    </div>


                    @endforeach



                            </div>
                         </div>
                      </div>
                   </div>
                </div>
</div>

@endsection