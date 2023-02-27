<?php

namespace App\Services\Implement;

use App\Services\UserService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserServiceImplement implements UserService
{
    // private array $users = [
    //     'admin' => 'admin'
    // ];
    function login(string $username, string $password)
    {
        // if (Auth::attempt(['username' => $username, 'password' => $password])) {
        //     session()->regenerate();
        //     session()->put('username', $username);
        // }


        // if (!isset($this->users[$username])) {
        //     return false;
        // }
        // return  true;
    }
}
