<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPost;

class HomeBlogController extends Controller
{
    public function frontBlog()
    {
        $blogCategory=BlogPostCategory::latest()->get();
        $blogPost=BlogPost::latest()->get();

         return view('frontend.blog.blog_list', compact('blogCategory','blogPost'));
    }

    public function blogPostDetails($id)
    {
        $blogPost=BlogPost::findOrFail($id);
        $blogCategory=BlogPostCategory::latest()->get();
        return view('frontend.blog.blog_details', compact('blogPost', 'blogCategory'));
    }

    public function blogPostCategory($id)
    {
        $blogCategory=BlogPostCategory::latest()->get();
        $blogPost=BlogPost::where('category_id',$id)->orderBy('id','DESC')->get();

         return view('frontend.blog.blog_cat_list', compact('blogCategory','blogPost'));
    }
}
