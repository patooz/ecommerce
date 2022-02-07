<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use Alert;

class SubSubCategoryController extends Controller
{
    public function ViewSubSubcategories(Type $var = null)
    {
        $categories= Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory=SubSubCategory::latest()->get();
        return view('backend.subsubcategories.sub_subcategories_view',compact('subsubcategory', 'categories'));
    }

    public function GetSubCategory($category_id)
    {
        $subcat=SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);

    }

    public function StoreSubSubCategory(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'subsubcategory_name_en'=>'required',
            'subsubcategory_name_swa'=>'required',
        ],[
            'subsubcategory_name_en.required'=>'Please Type Sub-Subcategory name in English.',
            'subsubcategory_name_swa.required'=>'Please Type Sub-Subcategory name in Swahili.',
            'category_id.required'=>'Please Select any Option.',
            'sub_category_id.required'=>'Please Select any Option.',


        ]);



        SubSubCategory::insert([
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_swa'=>$request->subsubcategory_name_swa,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_swa'=>strtolower(str_replace(' ', '-', $request->subsubcategory_name_swa)),



        ]);
        Alert::toast('Sub-Subcategory Created Successfully!', 'success');
        return redirect()->back();
    }
}
