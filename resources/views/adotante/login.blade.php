@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <script src="https://unpkg.com/lucide@latest"></script>
<div class="login-container">
    <div class="login-card">

        <div class="login-icon">
           <i data-lucide="user"></i>
        </div>

        <h1 class="login-title">Login Adotante</h1>

        <form method="POST" action="{{ route('adotante.login.post') }}">
            @csrf

            <div class="login-field">
                <input type="email" name="email" placeholder="Email" class="login-input" required>
            </div>

            <div class="login-field">
                <input type="password" name="password" placeholder="Senha" class="login-input" required>
            </div>

            <button type="submit" class="login-button">Entrar</button>
        </form>

        <a href="{{ route('adotante.register') }}" class="login-create">Criar conta</a>
    </div>
</div>
<script>
    lucide.createIcons();
</script>

@endsection
