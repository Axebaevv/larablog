<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;

use App\Category;
// EMAIL
use App\Mail\BlogPublished;
use Illuminate\Support\Facades\Mail;
//  HELPERS
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
// --END HELPERS
class BlogsController extends Controller
{
    public function __construct()
    {
        // only authors can have access for that particular function and also, it has 'except' instead of 'only'
        $this->middleware('author', ['only' => ['create', 'store', 'edit', 'update']]);
        $this->middleware('admin', ['only' => ['delete', 'trash', 'restore', 'permanentDelete']]);
    }
    public function index()
    {
        // $blogs = Blog::where('status', '1')->latest()->get();
        $blogs = Blog::latest()->get();
        // $blogs = Blog::orderBy('id', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate
        $rules = [
            'title' => ['required', 'min:2', 'max:160'],
            'body' => ['required', 'min:150'],
        ];

        $this->validate($request, $rules);
        // $blog = new Blog();
        // $blog->title = $request->title;
        // $blog->body = $request->body;
        // $blog->save();
        // Meta stuff
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['meta_title'] = Str::limit($request->title, 55);
        $input['meta_description'] = Str::limit($request->body, 155, '...');
        //image upload
        if ($file = $request->file('featured_image')) {
            $name = uniqid() . $file->getClientOriginalName();
            $name = Str::lower(Str::replace(' ', '-', $name));
            $file->move('images/featured_image', $name);
            $input['featured_image'] = $name;
        }
        // $blog = Blog::create($input);
        $blogByUser = $request->user()->blogs()->create($input);
        //$request->category_id is the name of the input & means in $request has the category_id
        if ($request->category_id) {
            $blogByUser->category()->sync($request->category_id);
        }

        // Email
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->queue(new BlogPublished($blogByUser, $user));
        }
        $request->session()->flash('blog_created_message', 'Congratulations on creating a great blogs');
        return redirect('/blogs ');
    }

    public function show($slug)
    {
        $categories = Category::latest()->get();
        $blog = Blog::where('slug', $slug)->first();
        return view('blogs.show', compact('blog'));
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        // To except checked checkers
        $blogCategories = [];
        foreach ($blog->category as $category) {
            $blogCategories[] = $category->id;
        }
        $filtered = Arr::except($categories, $blogCategories);
        return view('blogs.edit', compact('blog', 'categories', 'filtered'));
    }

    public function update(Request $request, int $id)
    {
        // dd($request->status);
        $input = $request->all();
        $blog = Blog::findOrFail($id);
        if ($file = $request->file('featured_image')) {
            if ($blog->featured_image) {
                unlink('images/featured_image/' . $blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = Str::lower(Str::replace(' ', '-', $name));
            $file->move('images/featured_image', $name);
            $input['featured_image'] = $name;
        }
        $blog->update($input);
        // sync with categories
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }
        return redirect('blogs');
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }

    public function trash()
    {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete(int $id)
    {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }
}
