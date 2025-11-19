<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showBlogs(){

        $blogs = Blog::latest()->filter(request(['search', 'category', 'user']))->paginate(6)->withQueryString();
        

        return view('blogs', ['title' => 'Blogs', 'blogs' => $blogs]);
    }

    public function singleBlog($slug){

        $blog = Blog::where('slug', $slug)->firstOrFail();
        

        return view('single-blog', ['title' => 'Single Blogs', 'blogs' => $blog]);
    }

}
