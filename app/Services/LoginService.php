<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{ 
    /**
     * Handle process login
     *
     * @param array $data data
     *
     * @return \Illuminate\Http\Response
     */
    public function login(array $data)
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            session()->flash('error', trans('login.invalid_account'));
            return false;
        }
        if (!(\Hash::check($data['password'], $user->password))) {
            session()->flash('error', trans('login.incorrect_password'));
            return false;
        }
        if (\Auth::attempt($data)) {
            return true;
        }
        return false;
    }
}
