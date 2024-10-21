@extends('user_template.layouts.template')
@section('main-content')
<div class="fashion_section">
    <div id="main_slider">
             <div class="container">
                <h1 class="fashion_taital">{{ $categories->category_name }} - ({{ $categories->product_count }})</h1>
                <div class="fashion_section_2">
                   <div class="row">
                      @foreach ($products as $item)
                      <div class="col-lg-4 col-sm-4">
                         <div class="box_main">
                            <h4 class="shirt_text">{{ $item->product_name }}</h4>
                            <p class="price_text">Price  <span style="color: #262626;">$ {{ $item->price }}</span></p>
                            <div class="tshirt_img"><img src="{{ asset($item->product_img)}}"></div>
                            <div class="btn_main">
                              <form action="{{ route('addproducttocart') }}" method="post">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{ $item->id }}">
                                 <input type="hidden" name="price" value="{{ $item->price }}">
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
@endsection