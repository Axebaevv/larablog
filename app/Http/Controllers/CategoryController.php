<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
// It is for using HELPER functions
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a Listing Of The Resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        // Instead Of Comapct() We Can Use Also ['categories'=> $categories];
        return view('categories.index', compact('categories'));
    }

    /**
     * Show The Form For Creating A New Resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name ); To check it
        /*  $result = $request->all();
        $category = Category::create($result); */
        // ---  Second way of doing it
        Category::create([
            'name' => $request['name'],
            // str_slug($request['name'], '-') does not work str_slug --- Laravel 5 and 6 and in Laravel 6 it will be Str::slug();
            'slug' => Str::slug($request['name'], '-'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Don't forget to add first(), if you forget, it will display an error
        $category = Category::where('slug', $slug)->first();
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('categories');
    }

    public function trash(){
    $trashedCategories = Category::onlyTrashed()->get();
    return view('categories.trash', compact('trashedCategories'));
    }

    public function restore($id){
    $restoreCategory = Category::onlyTrashed()->findOrFail($id);
    $restoreCategory->restore($restoreCategory);
    return redirect('/categories/index/trash');
    }

    public function permanentDelete($id){
        $permanentDelete = Category::onlyTrashed()->findOrFail($id);
        $permanentDelete->forceDelete($permanentDelete);
        return back();
    }
}
