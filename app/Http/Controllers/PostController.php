<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

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
            $posts = Post::latest()->paginate( 9 )->withQueryString();
        }
        $categories = Category::latest()->get();
        return view( 'posts.index', compact( 'posts', 'categories' ) );
    }

    public function posts() {
        $posts = Post::latest()->get();
        return view( 'admin.post.index', compact( 'posts' ) );
    }

    public function post( $slug ) {
        $post = Post::where( 'slug', $slug )->first();
        return view( 'admin.post.show', compact( 'post' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        return view( 'admin.post.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {

        $validated = $request->validate( [
            'title'       => 'required|unique:posts|max:255',
            'category_id' => 'required',
            'excerpt'     => 'required|min:200',
            'body'        => 'required|min:255',
        ] );

        if ( $request->hasFile( 'image' ) ) {
            $file = $request->file( 'image' );
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file = Image::make($request->file( 'image' ));
            $file->resize(1180, 860);
            $file->save( 'uploads/'. $fileName, 80 );
        }

        Post::create( [
            'user_id'     => Auth::user()->id,
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'slug'        => Str::slug( $request->title ),
            'excerpt'     => $request->excerpt,
            'body'        => $request->body,
            'image'       => $fileName,
        ] );

        sweetalert()->addSuccess( 'Your Post Has Been Stored' );
        return redirect()->route( 'admin.posts' );
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
        $post = Post::findOrFail( $id );
        $post->delete();

        sweetalert()->addSuccess( 'Post delete successfully done!!!' );
        return redirect()->route( 'admin.posts' );
    }
}
