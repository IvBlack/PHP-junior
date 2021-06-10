<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LogSocController extends Controller
{
    //after click on 'login through' button
    public function loginVK() {
        return Socialite::driver('vkontakte')->redirect();
    }

    //response from API
    public function responseVK() {
        $user =  Socialite::driver('vkontakte')->user();
        dd($user);
    }
}
