<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {

        return response()
            ->view("user.login", [
                "title" => "Login"
            ]);
    }

    public function doLogin(Request $request)
    {
        // validate input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:5'
        ]);
        // $username = $credentials['username'];
        // $password = $credentials['password'];

        if ($this->userService->login($credentials)) {
            return redirect()->intended('/todolist')->with('welcomeBack', 'welcome back ');
        }

        return back()->with('loginError', 'login failed!');
    }

    public function doLogout(Request $request): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // $request->session()->forget("username");
        return redirect("/");
    }
}
