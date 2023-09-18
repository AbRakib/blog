<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index() {
        return view( 'auth.register' );
    }

    public function store( Request $request ) {
        $validated = $request->validate( [
            'name'     => 'required|unique:users|max:25',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ] );
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->slug = Str::slug($request->name);
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();

        // sweet alert message show
        sweetalert()->addSuccess('Your account create successfully done.');
        return redirect()->route('home');
    }
}
