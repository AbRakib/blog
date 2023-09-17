<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if ( request( 'search' ) ) {
            $posts = Post::latest()
                ->where( 'title', 'like', '%' . request( 'search' ) . '%' )
                ->orWhere( 'body', 'like', '%' . request( 'search' ) . '%' )
                ->get();
        } else {
            $posts = Post::latest()->get();
        }
        $categories = Category::latest()->get();
        return view( 'posts.index', compact( 'posts', 'categories' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( string $slug ) {
        $post = Post::where( 'slug', $slug )->first();
        $categories = Category::latest()->get();
        return view( 'posts.show', compact( 'post', 'categories' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        //
    }
}
