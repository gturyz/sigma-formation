<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if(Auth::user() && Auth::user()->id === 1) {
            $users = User::all()->where('accepted' , '=', false);
            return view('dashboard', compact('users'));
        } else {
            return redirect('/');
        }
    }
}
