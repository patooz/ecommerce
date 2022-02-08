<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Alert;

class ProductController extends Controller
{
    public function AddProduct(Type $var = null)
    {
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('backend.products.add_product', compact('categories', 'brands'));
    }
}
