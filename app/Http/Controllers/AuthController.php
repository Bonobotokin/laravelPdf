<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Gère la déconnexion de l'utilisateur.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Gère le processus de connexion de l'utilisateur.
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Vous êtes connecté avec succès !');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'Les informations d\'identification fournies sont incorrectes. Veuillez vérifier votre email et votre mot de passe.',
        ])->withInput($request->only('email'));
    }
}
