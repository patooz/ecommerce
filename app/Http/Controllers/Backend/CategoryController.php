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

    public function EditCategory($id)
    {
        $category=Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id=$request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en'=>$request->category_name_en,
            'category_name_swa'=>$request->category_name_swa,
            'category_slug_en'=>strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_swa'=>strtolower(str_replace(' ', '-', $request->category_name_swa)),
            'category_icon'=>$request->category_icon,



        ]);
        Alert::toast('Category Updated Successfully!', 'success');
        return redirect()->route('all.categories');
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        Alert::toast('Category Deleted Successfully!', 'success');
            return redirect()->back();
    }
}
