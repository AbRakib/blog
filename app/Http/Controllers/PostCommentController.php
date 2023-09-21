<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller {
    public function store( Post $post ) {

        request()->validate( [
            'body' => 'required',
        ] );

        if ( !Auth::user() ) {
            sweetalert()->addWarning( 'Login Please Sir!!' );
            return redirect()->route( 'login' );
        }

        $post->comments()->create( [
            'user_id' => request()->user()->id,
            'body'    => request()->input( 'body' ),
        ] );

        sweetalert()->addSuccess( 'Your Comments Successfully Done' );
        return back();
    }
}
