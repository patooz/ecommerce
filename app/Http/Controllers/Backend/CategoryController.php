<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Alert;

class CategoryController extends Controller
{
    public function ViewCategory()
    {
        $category=Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name_en'=>'required',
            'category_name_swa'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name_en.required'=>'Please Type Category name in English',
            'category_name_swa.required'=>'Please Type Category name in Kiswahili',


        ]);



        Category::insert([
            'category_name_en'=>$request->category_name_en,
            'category_name_swa'=>$request->category_name_swa,
            'category_slug_en'=>strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_swa'=>strtolower(str_replace(' ', '-', $request->category_name_swa)),
            'category_icon'=>$request->category_icon,



        ]);
        Alert::toast('Category Created Successfully!', 'success');
        return redirect()->back();

    }
}
