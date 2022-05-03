<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipCounty;
use Carbon\Carbon;
use Alert;
// use Illuminate\Support\Str;

class ShippingAreaController extends Controller
{
    public function ViewCounty()
    {
        $county=ShipCounty::latest()->get();
        return view('backend.shipping.county.view_county',compact('county'));
    }

    public function StoreCounty(Request $request)
    {
        $request->validate([
            'county_name'=>'required ||unique:ship_counties',

        ],[
            'county_name.required'=>'Please Type the County name',
            'county_name.unique'=>'This County already exists in the Database',

        ]);

        ShipCounty::insert([
            'county_name'=> ucfirst($request->county_name),
            'created_at'=> Carbon::now(),

        ]);
        Alert::toast('County Created Successfully!', 'success');
        return redirect()->back();

    }

    public function EditCounty($id)
    {
        $county=ShipCounty::findOrFail($id);
        return view('backend.shipping.county.edit_county',compact('county'));
    }

    public function UpdateCounty(Request $request,$id)
    {
        $request->validate([
            'county_name'=>'required ||unique:ship_counties',

        ],[
            'county_name.required'=>'Please Type the County name',
            'county_name.unique'=>'This County already exists in the Database',

        ]);

        ShipCounty::findOrFail($id)->update([
            'county_name'=> ucfirst($request->county_name),
            'created_at'=>Carbon::now(),

        ]);
        Alert::toast('County updated Successfully!', 'info');
        return redirect()->route('manage.county');
    }

    public function DeleteCounty($id)
    {
        ShipCounty::findOrFail($id)->delete();

        Alert::toast('County Deleted Successfully!', 'success');
        return redirect()->back();
    }
}
