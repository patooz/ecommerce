<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function ViewBrand()
    {
        $brands=Brand::latest()->get();
        return view('backend.brands.brand_view',compact('brands'));
    }

    public function StoreBrand()
    {
        # code...
    }
}
