<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
     //Show Register/Create Form
     public function create(){
        return view('user.register');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input = $request->all();
        $input['password'] = \Hash::make($request->password);
        $user = User::create($input);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }



    public function showLoginForm(){
        return view('user.login');
    }
    public function login(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('posts.index')->with('message','You are now logged in!');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
 
    }

    public function logout(Request $request) {
        Auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','You have been logged out');
    }
}
