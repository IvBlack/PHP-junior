<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(User $user) {
        if($user->id !=Auth::id()) {
            $user->is_admin = !$user->is_admin;
            $user->save();
                return redirect()->route('admin.updateUser')->with('success', 'Rights r changed!');
        } else {
                return redirect()->route('admin.updateUser')->with('error', 'U cannot drop yourself!');
        }
    }
}
