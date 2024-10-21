@extends('user_template.layouts.template')
@section('main-content')
<h1>Addtocart Page</h1>
@if(session()->has('massage'))
                  <div class="alert alert-danger">
                    {{ session()->get('massage')}}
                 </div>
                @endif
                <div class="row">
                  <div class="col-12">
                    <div class="box_main">
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th>Product name</th>
                            <th>Product img</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                          @php
                              $total=0;
                          @endphp
                          @foreach ($cart_item as $item)
                          <tr>
                            @php
                                $product_name=App\Models\Product::where('id',$item->id)->value('product_name');
                                $img=App\Models\Product::where('id',$item->id)->value('product_img');
                            @endphp
                            <th>{{ $product_name }}</th>
                            <th><img src="{{ asset($img) }}" style="height: 100px"></th>
                            <th>{{ $item->quantity }}</th>
                            <th>{{ $item->price }}</th>
                            <th><a class="btn btn-warning" href="{{ route('removeitem',$item->id) }}">Remove</a></th>
                          </tr>
                          @php
                              $total=$total+$item->price;
                          @endphp                         
                          @endforeach
                          @if ($total>0)
                          <tr>
                            <td></td>
                            <td></td>
                            <td>total</td>
                            <td>{{ $total }}</td>
                            <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Checkout</a></td>
                            {{-- @if ($total=0)
                            <td><a href="" class="btn btn-primary disabled">Checkout</a></td>
                            @else
                            <td><a href="" class="btn btn-primary">Checkout</a></td>
                            @endif --}}
                          </tr> 
                          @endif
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
@endsection