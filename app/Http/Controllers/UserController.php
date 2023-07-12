<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function store(Request $request){
        
        $newUser=$request->validate([
            'name'=>'required|string|max:25',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
        ]);

        
        $newUser['password'] = bcrypt($newUser['password']);
       

        $user=User::create($newUser);

        auth()->login($user);

        return redirect(route('blog.index'))->with('message','Registered Successfully!');
    }

    public function login(){
        return view('users.login');
    }

    public function logout(Request $request){

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('users.login')->with('message','You have logged out successfully!');
    }

    public function authentification(Request $request){

        //dd($request->all());
        $formfields=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();
            return redirect(route('blog.index'))->with('message','You have logged In!');
        }

      return back()->withErrors(['email','Invalid Confidentials'])->onlyInput('email');
    }

    
}
