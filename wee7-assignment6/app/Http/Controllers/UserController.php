<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditProfileRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{



public function home(){
    if(auth()->check()){

        return view('home');
    }
    return redirect()->route('register');

}


public function showLoginForm(){
         return view('user.login');
}
public function login(UserLoginRequest $request){
    $incomingFields = $request->validated();

    if(auth()->attempt([
        'email'=>$incomingFields['email'],
        'password'=>$incomingFields[ 'password']
        ])){
            $request->session()->regenerate();
            return redirect()->route('home');

        }else{
            return redirect()->back()->withErrors([
                'email'=>'The provided credentials do not match our records.',
            ]);
        }

    }




public function showRegisterForm(){
    return view('user.register');

}
public function register(UserRegisterRequest $request){

    $incomingFields = $request->validated();
    // dd($request); When the request are not full fill the critrial then the request code excuting stop here. If pass the all of the test then it's hit all of the code

    $password = $incomingFields['password'];
    $password = Hash::make($password);
    $user= User::create($incomingFields);
    auth()->login($user);
    return redirect()->route('home');

}
}