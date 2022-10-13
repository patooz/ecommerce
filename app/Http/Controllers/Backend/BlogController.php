<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function blogCategory()
    {
        $blogCategory=BlogPostCategory::latest()->get();
        return view('backend.blog.category.view_blog_category', compact('blogCategory'));
    }

    public function storeBlogCategory(Request $request)
    {
         $request->validate([
            'blog_category_name_eng'=>'bail|required',
            'blog_category_name_swa'=>'required',
            
        ],[
            'blog_category_name_eng.required'=>'Please Type Blog Category name in English',
            'blog_category_name_swa.required'=>'Please Type Blog Category name in Kiswahili',


        ]);



        BlogPostCategory::insert([
            'blog_category_name_eng'=>$request->blog_category_name_eng,
            'blog_category_name_swa'=>$request->blog_category_name_swa,
            'blog_category_slug_eng'=>strtolower(str_replace(' ', '-', $request->blog_category_name_eng)),
            'blog_category_slug_swa'=>strtolower(str_replace(' ', '-', $request->blog_category_name_swa)),
            'created_at' => Carbon::now()

        ]);
        $notification = array(
            'message' => 'Blog Category Created Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->back()->with($notification);
    }

    public function editBlogCategory(Request $request, $blog_id)
    {
        $blogCategory=BlogPostCategory::findOrFail($blog_id);
        return view('backend.blog.category.edit_blog_category', compact('blogCategory'));
    }

    public function updateBlogCategory(Request $request, $blog_id)
    {
        $request->validate([
            'blog_category_name_eng'=>'required',
            'blog_category_name_swa'=>'required',
            
        ],[
            'blog_category_name_eng.required'=>'Please Type Blog Category name in English',
            'blog_category_name_swa.required'=>'Please Type Blog Category name in Kiswahili',


        ]);



        BlogPostCategory::findOrFail($blog_id)->update([
            'blog_category_name_eng'=>$request->blog_category_name_eng,
            'blog_category_name_swa'=>$request->blog_category_name_swa,
            'blog_category_slug_eng'=>strtolower(str_replace(' ', '-', $request->blog_category_name_eng)),
            'blog_category_slug_swa'=>strtolower(str_replace(' ', '-', $request->blog_category_name_swa)),
            'created_at' => Carbon::now()

        ]);
        $notification = array(
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'info'


        );
        return redirect()->route('blog_category')->with($notification);
    }

    public function deleteBlogCategory($blog_id)
    {
        BlogPostCategory::findOrFail($blog_id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


     /////  all blog post methods

    public function viewBlogPost()
    {
        $blogPost=BlogPost::with('blogCategory')->latest()->get();
        return view('backend.blog.post.view_blog_post', compact('blogPost'));
    }


    public function addBlogPost()
    {
        $blogCategory=BlogPostCategory::latest()->get();
        $blogPost=BlogPost::latest()->get();
        return view('backend.blog.post.add_blog_post', compact('blogPost','blogCategory'));
        
    }

    public function storeBlogPost(Request $request)
    {
         $request->validate([
            'post_title_en'=>'required',
            'post_title_swa'=>'required',
            'post_image'=>'required',
        ],[
            'post_title_en.required'=>'Please Type Post name in English',
            'post_title_swa.required'=>'Please Type Post name in Kiswahili',


        ]);

        $image=$request->file('post_image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,450)->save('upload/post/'.$name_gen);
        $save_url='upload/post/'.$name_gen;

        BlogPost::insert([
            'category_id'=>$request->category_id,
            'post_title_en'=>$request->post_title_en,
            'post_title_swa'=>$request->post_title_swa,
            'post_details_en'=>$request->post_details_en,
            'post_details_swa'=>$request->post_details_swa,
            'post_image'=>$save_url,
            'post_slug_en'=>strtolower(str_replace('', '-', $request->post_title_en)),
            'post_slug_swa'=>strtolower(str_replace(' ', '-', $request->post_title_swa)),
            'created_at'=>Carbon::now(),



        ]);
        $notification = array(
            'message' => 'Blog Post Stored Successfully!',
            'alert-type' => 'success'


        );
        return redirect()->route('view_blog_post')-> with($notification);
    }

    public function editBlogPost($post_id)
    {
        $blogCategory=BlogPostCategory::latest()->get();
        $blogPost=BlogPost::findOrFail($post_id);
        return view('backend.blog.post.edit_blog_post', compact('blogPost','blogCategory'));
    }

    public function updateBlogPost(Request $request, $post_id)
    {
        // $blogPost=BlogPost::findOrFail($post_id);
        // $img=$blogPost->post_image;
        $old_image=$request->old_image;
            

        if ($request->file('post_image')) {

        unlink($old_image);
        $image=$request->file('post_image');
        $name_gen=hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,450)->save('upload/post/'.$name_gen);
        $save_url='upload/post/'.$name_gen;

        BlogPost::findOrFail($post_id)->update([
            'category_id'=>$request->category_id,
            'post_title_en'=>$request->post_title_en,
            'post_title_swa'=>$request->post_title_swa,
            'post_details_en'=>$request->post_details_en,
            'post_details_swa'=>$request->post_details_swa,
            'post_image'=>$save_url,
            'post_slug_en'=>strtolower(str_replace('', '-', $request->post_title_en)),
            'post_slug_swa'=>strtolower(str_replace(' ', '-', $request->post_title_swa)),
            'updated_at'=>Carbon::now(),
 
        ]);
            $notification = array(
            'message' => 'Blog Post Updated Successfully!',
            'alert-type' => 'info'
            );
        
             return redirect()->route('view_blog_post')-> with($notification);

            } else  {


        BlogPost::findOrFail($post_id)->update([
            'category_id'=>$request->category_id,
            'post_title_en'=>$request->post_title_en,
            'post_title_swa'=>$request->post_title_swa,
            'post_details_en'=>$request->post_details_en,
            'post_details_swa'=>$request->post_details_swa,
            'post_slug_en'=>strtolower(str_replace('', '-', $request->post_title_en)),
            'post_slug_swa'=>strtolower(str_replace(' ', '-', $request->post_title_swa)),
            'updated_at'=>Carbon::now(),
 
        ]);
            $notification = array(
            'message' => 'Blog Post Updated Successfully!',
            'alert-type' => 'success'
            );
        
             return redirect()->route('view_blog_post')-> with($notification);
 
            
            
            }        
  
    }

    public function deleteBlogPost($post_id)
    {
        $blogPost=BlogPost::findOrFail($post_id);
        $img=$blogPost->post_image;

        if ($img == NULL) {

        unlink($img);
        BlogPost::findOrFail($post_id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success'
            );

             return redirect()->route('view_blog_post')-> with($notification);
        } else {

        BlogPost::findOrFail($post_id)->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfully!',
            'alert-type' => 'success'
            );

             return redirect()->route('view_blog_post')-> with($notification);
        }
        
        
    }

    
    
}
