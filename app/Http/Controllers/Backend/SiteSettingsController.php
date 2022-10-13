<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use App\Models\SiteSettings;
use App\Models\SeoModel;

class SiteSettingsController extends Controller
{
    public function siteSettings()
    {
        $sitesettings=SiteSettings::find(1);

        return view('backend.settings.update_settings', compact('sitesettings'));
    }

    public function updatSiteSettings(Request $request, $setting_id)
    {
        
    
        if ($request->file('logo')) {
        $image=$request->file('logo');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(139,36)->save('upload/logo/'.$name_gen);
        $save_url='upload/logo/'.$name_gen;

        SiteSettings::findOrFail($setting_id)->update([
            'phone_one'=>$request->phone_one,
            'phone_two'=>$request->phone_two,
            'logo'=>$save_url,
            'email'=>$request->email,
            'company_name'=>$request->company_name,
            'company_address'=>$request->company_address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            
            

        ]);
       $notification = array(
            'message' => 'Site Settings Updated Successfully!',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);

        } else {
            SiteSettings::findOrFail($setting_id)->update([
                'phone_one'=>$request->phone_one,
                'phone_two'=>$request->phone_two,
             
                'email'=>$request->email,
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'youtube'=>$request->youtube,
                

            ]);
            $notification = array(
            'message' => 'Site Settings Updated Successfully!',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
        }

    }

    public function seoSettings()
    {
        
        $sitesettings=SeoModel::find(1);

        return view('backend.settings.seo_settings', compact('sitesettings'));
    }

    public function updateSeoSettings(Request $request, $seo_id)
    {
        SeoModel::findOrFail($seo_id)->update([
                'meta_title'=>$request->meta_title,
                'meta_author'=>$request->meta_author,
                'meta_keyword'=>$request->meta_keyword,
                'meta_description'=>$request->meta_description,
                'google_analytics'=>$request->google_analytics,
                'created_at'=>Carbon::now(),
               
                

            ]);
            $notification = array(
            'message' => 'SEO Settings Updated Successfully!',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);
        }
    
     
}
