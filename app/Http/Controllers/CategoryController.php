<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // categories show in table
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        // validation 
        $validated = $request->validate( [
            'title'       => 'required|unique:posts|max:255',
            'body'        => 'required|max:255',
        ] );

        $category = new Category();
        $category->title = $request->name;
        $category->slug = Str::slug($request->name);
        $category->body = $request->body;
        $category->save();

        sweetalert()->addSuccess('Category Stored Successfully');
        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     */
    public function show( string $slug ) {
        $categories = Category::latest()->get();
        $currentCategory = Category::where('slug', $slug)->first();
        $id = Category::where('slug', $slug)->first();
        $id = $id->id;
        $posts = Post::where('category_id', $id)->paginate(9);
        return view('posts.index', compact('posts', 'categories', 'currentCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        // find category by id and throw view page
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {

        $category = Category::findOrFail($id);
        $category->title = $request->name;
        $category->body = $request->body;
        $category->slug = Str::slug($request->name);
        $category->update();

        sweetalert()->addSuccess('Category Updated Successfully');
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        // get category by id
        $category = Category::findOrFail($id);
        $category->delete();
        sweetalert()->addSuccess('Category deleted successfully done');
        return redirect()->back();
    }
}
