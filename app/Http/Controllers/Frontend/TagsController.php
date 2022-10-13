<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;

class TagsController extends Controller
{
   public function TagWiseProducts($tag)
   {
       $products=Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_swa',$tag)->orderBy('id','DESC')->paginate(5);
       $categories=Category::orderBy('category_name_en','ASC')->get();

       return view('frontend.tags.tags_view',compact('products','categories'));

   }


   //Subcategory wise data
   public function SubCatWiseProducts($subcatId,$slug)
   {
    $products=Product::where('status',1)->where('subcategory_id',$subcatId)->paginate(6);
    $categories=Category::orderBy('category_name_en','ASC')->get();
    $subCatBreadCrum=SubCategory::with('category')->where('id', $subcatId)->get();

    return view('frontend.products.subcat_view',compact('products','categories', 'subCatBreadCrum'));
   }

   public function SubSubCatWiseProducts($subsubcatId,$slug)
   {
    $products=Product::where('status',1)->where('subsubcategory_id',$subsubcatId)->paginate(6);
    $categories=Category::orderBy('category_name_en','ASC')->get();
    $subSubCatBreadCrum=SubSubCategory::with(['category','subcategory'])->where('id', $subsubcatId)->get();

    return view('frontend.products.subsubcat_view',compact('products','categories', 'subSubCatBreadCrum'));
   }
}
