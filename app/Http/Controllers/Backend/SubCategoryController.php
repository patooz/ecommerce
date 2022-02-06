<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Alert;

class SubCategoryController extends Controller
{
    public function ViewSubcategories()
    {
        $categories= Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory=Subcategory::latest()->get();
        return view('backend.subcategories.subcategory_view',compact('subcategory', 'categories'));
    }

    public function StoreSubCategory(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_swa'=>'required',
        ],[
            'subcategory_name_en.required'=>'Please Type Subcategory name in English.',
            'subcategory_name_swa.required'=>'Please Type Subcategory name in Swahili.',
            'category_id.required'=>'Please Select any Option.',


        ]);



        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_swa'=>$request->subcategory_name_swa,
            'subcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_swa'=>strtolower(str_replace(' ', '-', $request->subcategory_name_swa)),



        ]);
        Alert::toast('Subcategory Created Successfully!', 'success');
        return redirect()->back();
    }

    public function EditSubCategory($id)
    {
        $categories= Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory=Subcategory::findOrFail($id);
        return view('backend.subcategories.subcategory_edit',compact('categories', 'subcategory'));
    }

    public function UpdateSubCategory(Request $request)
    {
        $subcat_id=$request->id;

        Subcategory::findOrFail($subcat_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_swa'=>$request->subcategory_name_swa,
            'subcategory_slug_en'=>strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_swa'=>strtolower(str_replace(' ', '-', $request->subcategory_name_swa)),



        ]);
        Alert::toast('Subcategory Updated Successfully!', 'success');
        return redirect()->route('all.subcategories');
    }

    public function DeleteSubCategory($id)
    {
        Subcategory::findOrFail($id)->delete();
        Alert::toast('Subcategory Deleted Successfully!', 'success');
                return redirect()->back();
    }

}
