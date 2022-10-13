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
        // $products=Product::latest()->get();
        // $addCode=$code['product_code']+1;
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
       return view('backend.products.view_products',compact('products'));
    }

    public function EditProduct($id)
    {
        $categories=Category::latest()->get();
        $multi_imgs=MultiImg::where('product_id',$id)->get();
        $brands=Brand::latest()->get();
        $subcategories=SubCategory::latest()->get();
        $subsubcategories=SubSubCategory::latest()->get();
        $products=Product::findOrFail($id);

        return view('backend.products.edit_product', compact('categories', 'brands', 'subcategories', 'subsubcategories', 'products','multi_imgs'));

    }

    public function UpdateProductData(Request $request)
    {
        $product_id=$request->id;

        Product::findOrFail($product_id)->update([
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
            'status'=>1,
            'created_at'=>Carbon::now(),

        ]);
        Alert::toast('Product Data Updated Successfully!', 'success');
        return redirect()->route('manage.products');

    }


    public function UpdateProductMulti_image(Request $request)
    {
        $imgs=$request->multi_img;
        foreach ($imgs as $id => $img) {
            $image_delete=MultiImg::findOrFail($id);
            unlink($image_delete->photo_name);



            $make_name=hexdec(uniqid()). '.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_images/'.$make_name);
            $uploadPath='upload/products/multi_images/'.$make_name;
            MultiImg::where('id',$id)->update([
                'photo_name'=>$uploadPath,
                'updated_at'=>Carbon::now(),
            ]);
            }

        Alert::toast('Product Multi Images Updated Successfully!', 'info');
        return redirect()->back();


    }

    public function UpdateProductThumb_nail(Request $request)
    {
       $product_id=$request->id;
       $old_img=$request->old_image;
       unlink($old_img);

       $image=$request->file('product_thumbnail');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thumbnails/'.$name_gen);
        $save_url='upload/products/thumbnails/'.$name_gen;

        Product::findOrFail($product_id)->update([
            'product_thumbnail'=>$save_url,
            'updated_at'=>Carbon::now(),
        ]);

        Alert::toast('Product Thumbnail Updated Successfully!', 'info');
        return redirect()->back();

    }

    public function DeleteProductMulti_Img($id)
    {
       $old_img=MultiImg::findOrFail($id);
       unlink($old_img->photo_name);
       MultiImg::findOrFail($id)->delete();

       Alert::toast('Product Image Deleted Successfully!', 'success');
       return redirect()->back();
    }

    public function ViewProduct($id)
    {
        $products=Product::findOrFail($id);
        $multi_imgs=MultiImg::where('product_id',$id)->get();
        $brands=Brand::first();
        $categories=Category::first();
        $subcategories=Subcategory::first();
        $subsubcategories=SubSubCategory::first();
        $all_products=Product::first();


        return view('backend.products.test', compact('products', 'multi_imgs','brands','categories','subcategories','subsubcategories','all_products'));
    }

    public function InactiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);

        Alert::toast('Product Inactive!', 'success');
        return redirect()->back();

    }

    public function ActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);

        Alert::toast('Product Active!', 'success');
        return redirect()->back();
    }

    public function DeleteProduct($id)
    {
        $product=Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrfail($id)->delete();

        $images=MultiImg::where('product_id',$id)->get();
            foreach($images as $image){
                unlink($image->photo_name);
                MultiImg::where('product_id',$id)->delete();
            }

            Alert::toast('Product Deleted Successfully!', 'success');
            return redirect()->back();

    }

    public function productStock()
    {
        $products=Product::latest()->get();
       return view('backend.products.product_stock',compact('products'));
    }

}

