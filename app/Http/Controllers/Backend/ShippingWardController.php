<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipCounty;
use App\Models\ShipSubcounty;
use App\Models\ShipWard;
use Carbon\Carbon;
use Alert;

class ShippingWardController extends Controller
{
    public function ViewWard()
    {
        $counties= ShipCounty::orderBy('county_name', 'ASC')->get();
        $subcounties=ShipSubcounty::orderBy('subcounty_name', 'ASC')->get();
        $wards=ShipWard::orderBy('id', 'ASC')->get();
        return view('backend.shipping.ward.view_ward',compact('subcounties','counties','wards'));
    }

    public function GetSubCounty($county_id)
    {
        $subsubcat=ShipSubcounty::where('county_id', $county_id)->orderBy('subcounty_name', 'ASC')->get();
        return json_encode($subsubcat);
    }

    public function StoreWard(Request $request)
    {

        $request->validate([
            'county_id'=>'required',
            'subcounty_id'=>'required',
            'ward_name'=>'required ||unique:ship_wards',

        ],[
            'county_id.required'=>'Please Select the County',
            'subcounty_id.required'=>'Please Select the Subcounty',
            'ward_name.required'=>'Please Type the Ward name',
            'ward_name.unique'=>'This Ward already exists in the Database',

        ]);

        ShipWard::insert([
            'county_id'=>$request->county_id,
            'subcounty_id'=>$request->subcounty_id,
            'ward_name'=> ucwords($request->ward_name),
            'created_at'=> Carbon::now(),

        ]);
        Alert::toast('Ward Created Successfully!', 'success');
        return redirect()->back();
    }

    public function EditWard(Request $request,$id)
    {
        $counties= ShipCounty::orderBy('county_name', 'ASC')->get();
        $subcounties=ShipSubcounty::findOrFail($id);

        $subcounty=ShipSubcounty::orderBy('subcounty_name', 'ASC')->get();
        $ward=Shipward::findOrFail($id);

        return view('backend.shipping.ward.edit_ward',compact('ward','counties','subcounties','subcounty'));

    }

    public function UpdateWard(Request $request,$id)
    {

        $request->validate([
            'county_id'=>'required',
            'subcounty_id'=>'required',
            'ward_name'=>'required',

        ],[
            'county_id.required'=>'Please Select the County',
            'subcounty_id.required'=>'Please Select the Subcounty',
            'ward_name.required'=>'Please Type the Ward name',


        ]);

        ShipWard::findOrFail($id)->update([
            'county_id'=>$request->county_id,
            'subcounty_id'=>$request->subcounty_id,
            'ward_name'=> ucwords($request->ward_name),
            'created_at'=> Carbon::now(),

        ]);
        Alert::toast('Ward Updated Successfully!', 'success');
        return redirect()->route('manage.ward');
    }

    public function DeleteWard($id)
    {
        ShipWard::findOrFail($id)->delete();
        return redirect()->route('manage.ward');

    }


}
