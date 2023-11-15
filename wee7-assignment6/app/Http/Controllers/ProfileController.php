<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserEditProfileRequest;

class ProfileController extends Controller
{
    //
    public function profile(){
        if(auth()->check()){
            return view('user.profile');
        }else{
            return redirect()->route('login');
        }
    }

    public function editProfile($id){
        if(!auth()->check()){
            return redirect()->route('login');
        }
        // $user = User::find($id);
        // return view('user.edit-profile',compact('user'));
        return view('user.edit-profile');
    }
    public function updateProfile(UserEditProfileRequest $request){
        if(!auth()->check()){
            return redirect()->route('login');
        }

        $incomingFields = $request->validated();
        $incomingFields = array_filter($incomingFields,function($value){
            return $value != null;
        }); // remove null values by using array_filter

        if(isset($incomingFields['password'])){
            $incomingFields['password'] = Hash::make($incomingFields['password']);
        }

        User::updateOrCreate(['id'=>auth()->user()->id],$incomingFields);
        return redirect()->route('profile');


    }
}
