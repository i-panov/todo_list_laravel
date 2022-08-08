<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signupRequest(Request $request) {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'email' => 'required|email|unique:App\Models\User',
                'password' => 'required|string|min:4',
            ]);

            /** @var User $user */
            $user = User::query()->create($data);

            $token = \Str::random();

            $user->tokens()->create([
                'type' => Token::TYPE_SIGNUP,
                'value' => \Hash::make($token),
            ]);

            //$user->notify();

            session()->flash('success', 'На ваш email отправлено письмо для подтверждения регистрации!');
            return redirect('auth.login');
        }

        return view('auth.signup_request');
    }

    public function signupConfirm(Request $request) {
    }

    public function passwordResetRequest(Request $request) {
    }

    public function passwordResetConfirm(Request $request) {
    }

    public function login(Request $request) {
    }

    public function logout() {
    }
}
