<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use App\Models\Testimonials;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class TestimonialsController extends Controller
{
    public function viewTestimonials()
    {
        $testimonials = Testimonials::latest()->get();
        return view('backend.testimonials.view_testimonials', compact('testimonials'));
    }

    public function addTestomonial()
    {
        return view('backend.testimonials.add_testimonial');
    }

    public function storeTestimonial(Request $request)
    {
        $image=$request->file('image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(255,255)->save('upload/testimonials/'.$name_gen);
        $save_url='upload/testimonials/'.$name_gen;

        Testimonials::insert([
            'name'=>$request->name,
            'image'=>$save_url,
            'description_en'=>$request->description_en,
            'description_swa'=>$request->description_swa,
            'company'=>$request->company,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Testimonial Added Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('view_testimonials')-> with($notification);

    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        return view('backend.testimonials.edit_testimonial', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, $id)
    {
        $old_image=$request->old_image;
        if ($request->file('image')) {
            unlink($old_image);

        $image=$request->file('image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(255,255)->save('upload/testimonials/'.$name_gen);
        $save_url='upload/testimonials/'.$name_gen;

        Testimonials::findOrFail($id)->update([
            'name'=>$request->name,
            'image'=>$save_url,
            'description_en'=>$request->description_en,
            'description_swa'=>$request->description_swa,
            'company'=>$request->company,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Testimonial Updated Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('view_testimonials')-> with($notification);
        } else {
            Testimonials::findOrFail($id)->update([
                'name'=>$request->name,
                'description_en'=>$request->description_en,
                'description_swa'=>$request->description_swa,
                'company'=>$request->company,
                'created_at'=>Carbon::now(),

            ]);
            $notification = array(
                'message' => 'Testimonial Updated Successfully!',
                'alert-type' => 'success'


            );
            return redirect()->route('view_testimonials')-> with($notification);
        }

    }

    public function deleteTestimonial($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        $img = $testimonial->image;
        unlink($img);
        Testimonials::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('view_testimonials')-> with($notification);

    }
}
