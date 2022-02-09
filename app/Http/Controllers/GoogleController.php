<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        try {
    
          return  $user = Socialite::driver('google')->user();
            // $isUser = User::where('fb_id', $user->id)->first();
     
            // if($isUser){
            //     Auth::login($isUser);
            //     return redirect('/');
            // }else{
            //     $createUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'fb_id' => $user->id,
            //         'password' => encrypt('admin@123')
            //     ]);
    
            //     Auth::login($createUser);
            //     return redirect('/');
            // }
    
        } catch (Exception $exception) {
            return $exception;
            // dd($exception->getMessage());
        }
    }
}