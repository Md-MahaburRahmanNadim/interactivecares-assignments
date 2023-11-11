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
    public function profile(){
        if(auth()->check()){
            return view('user.profile');
        }else{
            return redirect()->route('login');
        }
    }
    public function editProfile(UserEditProfileRequest $request){
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $incomingFields = null;
        if($request->method() == 'POST'){
           $incomingFields = $request->validated();
        $incomingFields = array_filter($incomingFields,function($value){
            return $value != null;
        });
        if(isset($incomingFields['password'])){
            $incomingFields['password'] = Hash::make($incomingFields['password']);
        }

        User::updateOrCreate(['id'=>auth()->user()->id],$incomingFields);
        return redirect()->route('profile');
        }
            return view('user.edit-profile');
    }


public function home(){
    if(auth()->check()){

        return view('home');
    }
    return redirect()->route('register');

}

public function signOut(){

}

public function login(UserLoginRequest $request){
    if($request->method()== 'POST'){
       $incomingFields = $request->validated();
        if(auth()->attempt([
            'email'=>$incomingFields['email'],
            'password'=>$incomingFields[ 'password']
        ])){
            $request->session()->regenerate();
            return redirect()->route('home');

        }
    }

    return view('user.login');

}
public function register(UserRegisterRequest $request){
    $incomingFields = null;
    $password= null;
if($request->method() == 'POST'){

    $incomingFields = $request->validated();
    // dd($request); When the request are not full fill the critrial then the request code excuting stop here. If pass the all of the test then it's hit all of the code

    $password = $incomingFields['password'];
    $password = Hash::make($password);
    $user= User::create($incomingFields);
    auth()->login($user);
    return redirect()->route('home');
}



       return view('user.register');

}
}