<?php

namespace App\Http\Controllers;

use App\Services\RegisterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }
    public function index(): Response
    {
        return response()
            ->view('user.register', [
                'title' => 'Registrasi'
            ]);
    }

    public function store(Request $request): Response|RedirectResponse
    {
        $validateData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        $username = $validateData['username'];
        $email = $validateData['email'];
        $password = $validateData['password'];

        if ($this->registerService->register($username, $email, $password)) {
            // session()->flash('Success', 'Registration Successfull!');
            return redirect("/login")->with('success', 'Registration Successfull!');
        }

        return response()->view("user.register", [
            "title" => "Register",
            "error" => "Fill The Box Based On Required"
        ]);
    }
}
