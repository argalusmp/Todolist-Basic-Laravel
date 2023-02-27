<?php

namespace App\Services;

interface UserService
{
    // public function login(string $username, string $password);
    public function login($credentials);
}
