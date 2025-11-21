<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Exibe o formulário de login do administrador.
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Realiza o login do administrador.
     */
    public function login(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Tentativa de login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Credenciais inválidas.']);
        }

        $user = Auth::user();

        // Verifica se o usuário é administrador
        if (!$user->is_admin) {
            Auth::logout();
            return back()->withErrors(['email' => 'Usuário não é administrador.']);
        }

        // Redireciona para o formulário de criação de animal
        return redirect()->route('admin.animals.index');
    }

    /**
     * Faz logout do admin.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('status', 'Logout realizado.');
    }

    /**
     * Tela inicial opcional do painel admin (caso você queira usar).
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Abre a página de cadastro de animais.
     */
    public function animalsCreate()
    {
        return view('animals.create');
    }
}
