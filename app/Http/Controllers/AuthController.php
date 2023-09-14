<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Undocumented function
     *
     * @return View
     */
    public function login(): View
    {
        return view('auth.login');
    }


    public function loginStart(LoginRequest $request)
    {

        $action = $request->validated();

        if (Auth::attempt($action)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Email Invalide',
        ])->onlyInput('email');
    }
}
