<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //  register user controller methods
    public function create(){
        return view('users.register');
    }

    // login user controller methods
    public function login(){
        return view('users.login');
    }

    // route to create a new user
    public function store(Request $request){
        $formFields = $request->validate([
            'username' => ['required', 'min:4'],
            'firstname' => ['required', 'min:4'],
            'lastname' => ['required','min:4'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message','User created and logged in successfully');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','You have been  logged out successfully');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in successfully');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials!!',
        ])->onlyInput('email');
    }
}
