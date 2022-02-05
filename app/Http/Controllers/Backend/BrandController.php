<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use RealRashid\SweetAlert\Facades\Alert;
use Image;

class BrandController extends Controller
{
    public function ViewBrand()
    {
        $brands=Brand::latest()->get();
        return view('backend.brands.brand_view',compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_swa'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name_en.required'=>'Please Type Brand name in English',
            'brand_name_swa.required'=>'Please Type Brand name in Kiswahili',


        ]);

        $image=$request->file('brand_image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url='upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_swa'=>$request->brand_name_swa,
            'brand_image'=>$save_url,
            'brand_slug_en'=>strtolower(str_replace('', '-', $request->brand_name_en)),
            'brand_slug_swa'=>strtolower(str_replace(' ', '-', $request->brand_name_swa)),



        ]);
        Alert::toast('Brand Created Successfully!', 'success');
        return redirect()->back();



    }

    public function EditBrand($id)
    {
        $brand=Brand::findOrFail($id);
        return view('backend.brands.brand_edit',compact('brand'));
    }

    public function UpdateBrand(Request $request)
    {
        $brand_id=$request->id;
        $old_image=$request->old_image;

        if ($request->file('brand_image')) {
        unlink($old_image);
        $image=$request->file('brand_image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url='upload/brand/'.$name_gen;

        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_swa'=>$request->brand_name_swa,
            'brand_image'=>$save_url,
            'brand_slug_en'=>strtolower(str_replace('', '-', $request->brand_name_en)),
            'brand_slug_swa'=>strtolower(str_replace(' ', '-', $request->brand_name_swa)),

        ]);
        Alert::toast('Brand Updated Successfully!', 'success');
        return redirect()->route('all.brands');
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_swa'=>$request->brand_name_swa,
                'brand_slug_en'=>strtolower(str_replace('', '-', $request->brand_name_en)),
                'brand_slug_swa'=>strtolower(str_replace(' ', '-', $request->brand_name_swa)),

            ]);
            Alert::toast('Brand Updated Successfully!', 'success');
            return redirect()->route('all.brands');
        }

    }

    public function DeleteBrand($id)
    {
        $brand=Brand::findOrFail($id);
        $img=$brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        Alert::toast('Brand Deleted Successfully!', 'success');
            return redirect()->back();

    }
}
