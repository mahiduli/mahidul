<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $allsubcategories=Subcategory::all();
        return view('admin.allsubcategory',compact('allsubcategories'));
    }

    public function addsubcategory()
    {
        $categories = Category::all();
        return view('admin.addsubcategory',compact('categories'));
    }

    public function StoreSubCategory(Request $request) {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id' => 'required'
        ]);

        $category_id=$request->category_id;

        $category_name=Category::where('id',$category_id)->value('category_name');

        Subcategory::insert([
            'subcategory_name' =>$request->subcategory_name,
            'slug' =>strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name
        ]);

        Category::where('id',$category_id)->increment('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('massage','SubCategory Added Successfully');

    }

    public function EditSubcat($id){
        $subcatinfo=Subcategory::findOrFail($id);
        return view('admin.editsubcat',compact('subcatinfo'));

    }
    
    public function Updatesubcat(Request $request){
        $subcatid = $request->subcatid;
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
        ]);

        Subcategory::findOrFail($subcatid)->update([
            'subcategory_name' =>$request->subcategory_name,
                'slug' =>strtolower(str_replace(' ','-',$request->subcategory_name))
        ]);

        return redirect()->route('allsubcategory')->with('massage','Sub Category Updated Successfully');

    }

    public function Deletesubcat($id){
        $cat_id=Subcategory::where('id',$id)->value('category_id');

        Subcategory::findOrFail($id)->delete();
        Category::where('id',$cat_id)->decrement('subcategory_count',1);
        
    return redirect()->route('allsubcategory')->with('massage','Sub Category Deleted Successfully');

    }
}

