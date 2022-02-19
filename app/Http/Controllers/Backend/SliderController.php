<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Alert;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function ViewSlider()
    {
        $sliders=Slider::latest()->get();
        return view('backend.sliders.view_slider', compact('sliders'));
    }

    public function StoreSlider(Request $request)
    {
        $request->validate([
            'slider_img'=>'required',

        ],[
            'slider_img.required'=>'Please Select Slider Image',

        ]);

        $image=$request->file('slider_img');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url='upload/slider/'.$name_gen;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'slider_img'=>$save_url,

        ]);
        Alert::toast('Slider Created Successfully!', 'success');
        return redirect()->back();



    }

    public function EditSlider($id)
    {
        $slider=Slider::findOrfail($id);
        return view('backend.sliders.edit_slider', compact('slider'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id=$request->id;
        $old_image=$request->old_image;

        if ($request->file('slider_img')) {
        unlink($old_image);
        $image=$request->file('slider_img');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url='upload/slider/'.$name_gen;

        Slider::findOrFail($slider_id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'slider_img'=>$save_url,


        ]);
        Alert::toast('Slider Updated Successfully!', 'success');
        return redirect()->route('manage.slider');
        } else {
            Slider::findOrFail($slider_id)->update([
                'title'=>$request->title,
                'description'=>$request->description,


            ]);
            Alert::toast('Slider Updated Successfully!', 'success');
            return redirect()->route('manage.slider');
        }

    }

    public function DeleteSlider($id)
    {
        $slider=Slider::findOrFail($id);
        $img=$slider->slider_img;
        unlink($img);

        Slider::findOrFail($id)->delete();
        Alert::toast('slider Deleted Successfully!', 'success');
            return redirect()->back();

    }

    public function InactiveSlider($id)
    {
       $slider=Slider::findOrFail($id)->update(['status'=>0]);
       Alert::toast('slider Deactivated Successfully!', 'success');
            return redirect()->back();

    }

    public function ActiveSlider($id)
    {
       $slider=Slider::findOrFail($id)->update(['status'=>1]);
       Alert::toast('slider Activated Successfully!', 'success');
            return redirect()->back();

    }


}
