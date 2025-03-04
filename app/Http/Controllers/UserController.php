<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Show Register Form
    public function create(){
        return view('users.register');
    }

    // Create User
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | confirmed | min:6'
            // ensure the password similar to password_confirmed
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        Auth::login($user);

        return redirect('/')-> with('message', 'User created and logged in !');
    }

    // Logout
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out !');

    }

    // display login form
    public function login(){
        return view('users.login');
    }

    // authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required | min:6'
        ]);

        if(Auth::attempt($formFields)){
            $request -> session() -> regenerate();

            return redirect('/')-> with('message', 'You are now Logged in !');
        }

        return back() -> withErrors(['email' => 'Invalid Credentials', 'password' => 'Invalid Credentials']) -> onlyInput('email');
    }
}
