<?php

namespace App\Services\Implement;

use App\Services\RegisterService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterServiceImplement implements RegisterService
{

    function register(string $username, string $email, string $password): bool
    {
        $query = DB::insert('INSERT INTO users (username,email,password) values (?,?,?)', [$username, $email, $password]);

        return $query;
    }
}
