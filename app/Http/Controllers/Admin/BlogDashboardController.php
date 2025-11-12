<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->where('user_id', Auth::user()->id);

        if(request('keyword')){
            $blogs->where('title', 'like', '%'.request('keyword').'%');
        }

        return view ('admin.dashboard', ['blogs' => $blogs->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();

        return view('admin.create-blog', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|min:6|max:100',
            'category_id' => 'required',
            'article' => 'required|min:20',
        ]);

        Blog::create([
            'title' => $request->title,
            'article' => $request->article,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard')->with(['success' => 'Blog successfully to added!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blogs)
    {
        return view('admin.detail-blog', ['blogs' => $blogs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $category = Category::get();
        return view('admin.edit-blog', ['blog' => $blog, 'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
         $request->validate([
            'title' => 'required|min:6|max:100|unique:blogs,title,' .$blog->id,
            'category_id' => 'required',
            'article' => 'required',
        ]);

        $blog->update([
            'title' => $request->title,
            'article' => $request->article,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard')->with(['success' => 'Blog successfully to updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/dashboard')->with(['success' => 'Blog successfully to removed!']);
    }
}
