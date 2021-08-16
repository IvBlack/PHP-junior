<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class LogSocController extends Controller
{
    //after click on 'login through' button
    public function loginVK() {
        if(Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    //response from API
    public function responseVK(UserRepository $userRepository) {
        if(Auth::check()) {
            return redirect()->route('Home');
        }
        $user =  Socialite::driver('vkontakte')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }
}
