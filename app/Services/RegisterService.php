<?php

namespace App\Services;

interface RegisterService
{
    public function register(string $username, string $email, string $password): bool;
}
