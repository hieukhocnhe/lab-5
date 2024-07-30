<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {

        return view('login');
    }
    public function postLogin(Request $request) {
        $data = $request->only('username', 'password');
        if(Auth::attempt($data)) {

            return redirect()->route('movies.index')->with('success', 'Login success!');
        }
        else {

            return redirect()->back()->with('error', 'Field username or password not match!');
        }
    }
    public function register() {

        return view('register');
    }
    public function postRegister(Request $request) {
        $data = $request->all();
        User::query()->create($data);

        return redirect()->route('login')->with('success', 'Register success!');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
