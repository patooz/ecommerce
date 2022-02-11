<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Alert;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('backend.products.add_product', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request)
    {

        $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnails/'.$name_gen);
        $save_url='upload/products/thumbnails/'.$name_gen;




        $product_id=Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_name_swa'=>$request->product_name_swa,
            'product_slug_en'=>strtolower(str_replace(' ', '-', $request->product_name_en )),
            'product_slug_swa'=>strtolower(str_replace(' ', '-', $request->product_name_swa )),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_swa'=>$request->product_tags_swa,
            'product_size_en'=>$request->product_size_en,
            'product_size_swa'=>$request->product_size_swa,
            'product_color_en'=>$request->product_color_en,
            'product_color_swa'=>$request->product_color_swa,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description_en'=>$request->short_description_en,
            'short_description_swa'=>$request->short_description_swa,
            'long_description_en'=>$request->long_description_en,
            'long_description_swa'=>$request->long_description_swa,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'product_thumbnail'=>$save_url,
            'status'=>1,
            'created_at'=>Carbon::now(),

        ]);


        //start multi-image upload

        $images=$request->file('multi_img');
        foreach($images as $img) {
            $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_images/'.$make_name);
            $uploadPath='upload/products/multi_images/'.$make_name;

            MultiImg::insert([
                'product_id'=>$product_id,
                'photo_name'=>$uploadPath,
                'created_at'=>Carbon::now(),
            ]);

        }

         //end multi-image upload

        Alert::toast('Product Created Successfully!', 'success');
            return redirect()->route('manage.products');


    }

    public function ManageProduct()
    {
       $products=Product::latest()->get();
       return view('backend.products.view_product',compact('products'));
    }

    public function EditProduct($id)
    {
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        $subcategories=SubCategory::latest()->get();
        $subsubcategories=SubSubCategory::latest()->get();
        $products=Product::findOrFail($id);

        return view('backend.products.edit_product', compact('categories', 'brands', 'subcategories', 'subsubcategories', 'products'));



    }

}

