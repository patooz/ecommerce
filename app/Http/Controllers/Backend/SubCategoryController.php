<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Alert;

class SubCategoryController extends Controller
{
    public function ViewSubcategories()
    {
        $subcategory=Subcategory::latest()->get();
        return view('backend.subcategories.subcategory_view',compact('subcategory'));
    }
}
