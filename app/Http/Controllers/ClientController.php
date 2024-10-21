<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shippinginfo;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function Categorypage($id){
        $categories=Category::findOrFail($id);
        $products=Product::where('product_category_id',$id)->latest()->get();
        return view('user_template.category',compact('categories','products'));
    }

    public function SingleProduct($id){
        $products=Product::find($id);
        $subcat_id=Product::where('id',$id)->value('product_subcategory_id');
        $related_product=Product::where('product_subcategory_id',$subcat_id)->latest()->get();
        return view('user_template.product',compact('products','related_product'));
    }

    public function Addtocart(){
        $userid=Auth::id();
        $cart_item=Cart::where('user_id',$userid)->latest()->get();
        return view('user_template.addtocart',compact('cart_item'));
    }
    
    public function Addproducttocart(Request $request){
        $product_price=$request->price;
        $quantity=$request->quantity;
        $price=$product_price * $quantity;
        Cart::insert([
          'product_id' => $request->product_id,
          'user_id' => Auth::id(),
          'quantity' => $request->quantity,
          'price' => $price
        ]);
        return redirect()->route('addtocart')->with('massage', 'your item added successfully');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('massage', 'your item remove successfully');
    }

    public function Checkout(){
        $userid=Auth::id();
        $cart_item=Cart::where('user_id',$userid)->latest()->get();
        $shipping_address=Shippinginfo::where('user_id',$userid)->first();
        
        return view('user_template.checkout',compact('cart_item','shipping_address'));
    }

    public function GetShippingAddress(){
        return view('user_template.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        Shippinginfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'postal_code' => $request->postal_code
        ]);
        return redirect()->route('checkout');
    }

    public function PlaceOrder(Request $request){
        $userid=Auth::id();
        $shipping_address=Shippinginfo::where('user_id',$userid)->first();
        $cart_item=Cart::where('user_id',$userid)->latest()->get();
        foreach($cart_item as $item){
            Order::insert([
                'user_id' => Auth::id(),
                'shipping_phonenumber' => $shipping_address->phone_number,
                'shipping_city' => $shipping_address->city,
                'shipping_postal_code' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price
                
            ]);
            $id=$item->id;
            Cart::where('user_id',$userid)->delete();

        }
        $shipping_address=Shippinginfo::where('user_id',$userid)->delete();

        return redirect()->route('Userprofilependingorder')->with('m32assage', 'your order placed successfully');
    }
    public function Userprofile(){
        return view('user_template.userprofile');
    }
    
    public function pendingaorder(){
        $pending_order=Order::where('status','pending')->latest()->get();
        return view('user_template.pendingaorder',compact('pending_order'));
    }
    
    public function History(){
        return view('user_template.history');
    }

    public function Newrelease(){
        return view('user_template.newrelease');
    }

    public function Todaysdeal(){
        return view('user_template.todaysdeal');
    }

    public function Customerservice(){
        return view('user_template.customerservice');
    }

}
