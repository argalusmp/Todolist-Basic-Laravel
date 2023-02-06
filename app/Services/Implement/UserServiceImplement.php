<?php

namespace App\Services\Implement;

use App\Services\UserService;

class UserServiceImplement implements UserService
{
    private array $users = [
        'admin' => 'admin'
    ];
    function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return  $password == $correctPassword;
    }
}
