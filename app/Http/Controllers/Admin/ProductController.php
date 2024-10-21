<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.allproduct',compact('products'));
    }

    public function addproduct()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('admin.addproduct',compact('categories','subcategories'));
    }

    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $image = $request->file('product_img');
        $img_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url='upload/'.$img_name;

       
        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name=Category::where('id',$category_id)->value('category_name');
        $subcategory_name=Subcategory::where('id',$subcategory_id)->value('subcategory_name');

        // Product::insert([
        //     'product_name' =>$request->product_name,
        //     'price' =>$request->price,
        //     'quantity' =>$request->quantity,
        //     'product_short_des' =>$request->product_short_des,
        //     'product_long_des' =>$request->product_long_des,
        //     'product_category_id' =>$request->product_category_id,
        //     'product_subcategory_id' =>$request->product_subcategory_id,
        //     'product_img' =>$img_url,
        //     'product_category_name' =>$category_name,
        //     'product_subcategory_name' =>$subcategory_name,
        //     'slug' =>strtolower(str_replace(' ','-',$request->product_name)),
        // ]);

        $product = new Product;
        $product->product_name=$request->product_name;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->product_short_des=$request->product_short_des;
        $product->product_long_des=$request->product_long_des;
        $product->product_category_id=$request->product_category_id;
        $product->product_subcategory_id=$request->product_subcategory_id;
        $product->product_img=$img_url;
        $product->product_category_name=$category_name;
        $product->product_subcategory_name=$subcategory_name;
        $product->slug=strtolower(str_replace(' ','-',$request->product_name));
        $product->save();

        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);

        return redirect()->route('allproduct')->with('massage','Product Added Successfully');

    }

    public function EditProduct($id){
        $productinfo=Product::findOrFail($id);
        return view('admin.editproduct',compact('productinfo'));
    }

    public function UpdateProduct(Request $request){
        $productid=$request->id;

        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ]);

        Product::findOrFail( $productid)->update([
            'product_name' =>$request->product_name,
            'price' =>$request->price,
            'quantity' =>$request->quantity,
            'product_short_des' =>$request->product_short_des,
            'product_long_des' =>$request->product_long_des,
            'slug' =>strtolower(str_replace(' ','-',$request->product_name)),
        ]);
        return redirect()->route('allproduct')->with('massage','Product Updated Successfully');

    }

    public function DeleteProduct($id){

        $cat_id=Product::where('id',$id)->value('product_category_id');
        $subcat_id=Product::where('id',$id)->value('product_subcategory_id');
        
        Product::findOrFail($id)->delete();

        Category::where('id',$cat_id)->decrement('product_count',1);
        Subcategory::where('id',$subcat_id)->decrement('product_count',1);

        return redirect()->route('allproduct')->with('massage','Product Deleted Successfully');


    }

}
