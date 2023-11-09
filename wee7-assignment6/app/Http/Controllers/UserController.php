<?php

namespace App\Http\Controllers;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
Validator::extend('min_if_not_null', function ($attribute, $value, $parameters, $validator) {
    // Check if the value is not null
    if ($value !== null) {
        // If not null, apply the 'min' rule
        $minRule = Validator::make([$attribute => $value], [
            $attribute => "min:$parameters[0]",
        ]);

       // if fails the rule then show the error message
        if ($minRule->fails()) {
            $validator->errors()->add($attribute, $minRule->errors()->first($attribute)); 
        }
        return !$minRule->fails();
    }

    // If the value is null, validation passes
    return true;
});

class UserController extends Controller
{
    public function profile(){
        if(auth()->check()){
            return view('user.profile');
        }else{
            return redirect()->route('login');
        }
    }
    public function editProfile(Request $request){
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $incomingFields = null;
        if($request->method() == 'POST'){
            $incomingFields = $request->validate([
                'firstName' => 'max:255|min:3',
        'lastName' => 'max:255|min:3',
        'email' => 'max:255|email|unique:users,email,'.auth()->user()->id,
        // 'password' => ['max:255','min_if_not_null:3,23'], here 3, 23 are the parameter of the min_if_not_null
        'password' => ['max:255','min_if_not_null:8'],
        'bio' => [ 'max:255', 'min_if_not_null:3'],
            ]);
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

public function login(Request $request){
    if($request->method()== 'POST'){
       $incomingFields=  $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
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
public function register(Request $request){
    $incomingFields = null;
    $password= null;
if($request->method() == 'POST'){

    $incomingFields = $request->validate([
        'firstName' => 'required|max:255|min:3',
        'lastName' => 'required|max:255|min:3',
        'username' => 'required|max:255|min:3|unique:users',
        'email' => 'required|max:255|min:3|unique:users|email',
        'password' => 'required|max:255|min:8',
    ]);
    // dd($request); When the request are not full fill the critrial then the request code excuting stop here. If pass the all of the test then it's hit all of the code

    $password = $incomingFields['password'];
    $password = Hash::make($password);
    User::create($incomingFields);
    return redirect()->route('login');
}



       return view('user.register');

}
}