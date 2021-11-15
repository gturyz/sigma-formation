<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function accept(int $id)
    {
        $user = User::find($id);
        $user->update(['accepted' => 1]);
        Mail::to($user->email)->send(new WelcomeMail($user));
        return back();
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $params = $request->validated();
        if ($params['password']) {
            $params['password'] = Hash::make($params['password']);
        }
        else{
            $params['password'] = $user->password;
        }
        $user->update($params);
        return back();
    }
}
