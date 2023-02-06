<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    private UserService $userService;

    public function setUp(): void
    {
        parent::setUp();
        $this->userService = $this->app->make(UserService::class);
    }

    public function testLogin()
    {
        self::assertTrue($this->userService->login('admin', 'admin'));
    }
    public function testLoginFailed()
    {
        self::assertFalse($this->userService->login('joko', 'joko'));
    }
    public function testWrongPassword()
    {
        self::assertFalse($this->userService->login('admin', 'wrong'));
    }
}
