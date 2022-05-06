<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipCounty;
use App\Models\ShipSubcounty;
use Carbon\Carbon;
use Alert;

class ShippingSubCountyController extends Controller
{
    public function ViewSubCounty()
    {
        $counties= ShipCounty::orderBy('county_name', 'ASC')->get();
        $subcounty=ShipSubcounty::with('county')->orderBy('id', 'ASC')->get();
        return view('backend.shipping.subcounty.view_subcounty',compact('subcounty','counties'));
    }

    public function StoreSubCounty(Request $request )
    {
        $request->validate([
            'county_id'=>'required',
            'subcounty_name'=>'required ||unique:ship_subcounties',

        ],[
            'county_id.required'=>'Please Select the County',
            'subcounty_name.required'=>'Please Type the County name',
            'subcounty_name.unique'=>'This County already exists in the Database',

        ]);

        ShipSubcounty::insert([
            'county_id'=>$request->county_id,
            'subcounty_name'=> ucwords($request->subcounty_name),
            'created_at'=> Carbon::now(),

        ]);
        Alert::toast('County Created Successfully!', 'success');
        return redirect()->back();
    }

    public function EditSubCounty(Request $request,$id)
    {
        $counties= ShipCounty::orderBy('county_name', 'ASC')->get();
        $subcounty=ShipSubcounty::findOrFail($id);
        return view('backend.shipping.subcounty.edit_subcounty',compact('subcounty','counties'));
    }

    public function UpdateSubCounty(Request $request,$id)
    {

        $request->validate([
            'county_id'=>'required',
            'subcounty_name'=>'required ',

        ],[
            'county_id.required'=>'Please Select the County',
            'subcounty_name.required'=>'Please Type the County name',


        ]);

        ShipSubcounty::findOrFail($id)->update([
            'county_id'=>$request->county_id,
            'subcounty_name'=> ucwords($request->subcounty_name),
            'created_at'=> Carbon::now(),

        ]);
        Alert::toast('Subcounty updated Successfully!', 'info');
        return redirect()->route('manage.subcounty');
    }

    public function DeleteSubCounty($id)
    {
        ShipSubcounty::findOrFail($id)->delete();
        return redirect()->route('manage.subcounty');

    }
}
