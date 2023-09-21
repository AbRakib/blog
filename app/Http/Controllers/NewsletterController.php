<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller {

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        // validate data
        $validated = $request->validate( [
            'email' => 'required|email|unique:newsletters',
        ] );

        // create new object for store data
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();

        // return back and message
        sweetalert()->addSuccess( 'Thanks for your subscribe' );
        return redirect()->back();
    }
}
