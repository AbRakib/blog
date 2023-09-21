<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index() {
        return view( 'auth.register' );
    }

    public function login() {
        return view('auth.login');
    }

    public function checkLogin(Request $request) {
        $validated = $request->validate( [
            'email'    => 'required|email',
            'password' => 'required',
        ] );

        // attempt to authentication log in user
        if (Auth::attempt($validated)) {
            if(Auth::user()->role == 'admin'){
                sweetalert()->AddSuccess('Welcome Back Chef');
                return redirect()->route('dashboard');
            }
            sweetalert()->AddSuccess('Welcome Back Chef');
            return redirect()->route('home');
        }

        // attempt to authentication failed
        sweetalert()->addWarning('You are not a valid user!!!');
        return redirect()->route('login');
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

        // login user 
        Auth::login($user);

        // sweet alert message show
        sweetalert()->addSuccess('Your account create successfully done & Logged In');
        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        // sweet alert message show
        sweetalert()->addSuccess('Your account sign out successfully done');
        return redirect()->route('home');
    }
}
