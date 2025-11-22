@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://unpkg.com/lucide@latest"></script>
<div class="login-container">
    <div class="login-card">

        <h1 class="login-title">Cadastro</h1>

        <!-- Ícone no canto direito -->
        <div class="login-icon">
            <i data-lucide="user"></i>
        </div>

        <form method="POST" action="{{ route('amin.register.post') }}">
            @csrf

            {{-- NOME --}}
            <div class="login-field">
                <label class="login-label">Nome</label>
                <input type="text" name="nome" class="login-input" required>
            </div>


            {{-- EMAIL --}}
            <div class="login-field">
                <label class="login-label">E-mail</label>
                <input type="email" name="email" class="login-input" required>
            </div>

            {{-- SENHA --}}
            <div class="login-field">
                <label class="login-label">Senha</label>
                <input type="password" name="password" class="login-input" required>
            </div>

            <button type="submit" class="login-button">Cadastrar</button>

            <a href="{{ route('admin.login') }}"
                class="login-btn login-btn-secondary"
                style="float: right;">
                Login
            </a>

        </form>

    </div>
</div>
<script>
    lucide.createIcons();
</script>

@endsection