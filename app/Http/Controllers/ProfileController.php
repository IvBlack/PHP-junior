<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

//получаем юзера после авторизации
//прокидываем во вьюху нашего юзера
class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();
        $errors=[];
        //проверяем данные от юзера
        if($request->isMethod('post')) {
                $this->validate($request, $this->validateRules(), [], $this->attributeNames());

                if(Hash::check($request->post('password'), $user->password)) {
                    $user->fill([
                        'name' => $request->post('name'),
                        'password' => Hash::make($request->post('newPassword')),
                        'email' => $request->post('email')
                    ]);
                    $user->save();
                    return redirect()->route('updateProfile')->with('success', 'Pass changed successfuly!');
                } else {
                    $errors['password'][] = 'Wrong pass';
                    return redirect()->route('updateProfile')->withErrors($errors);
                }
            }

        //dd($user);
        //if method is get
        return view('profile', [
            'user' => $user
        ]);
    }

    //правила валидации для данных от юзера
    protected function validateRules() {
        return [
        'name' => 'required|string|max:15',
        'email' => 'required|email|unique:users, email,'.Auth::id(),
        'password' => 'required',
        'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'New password'
        ];
    }
}
