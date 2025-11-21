<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PetRescue')</title>

    {{-- CSS principal --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        header {
            background: #fff;
            border-bottom: 2px solid #e5e5e5;
            padding: 18px 0;
        }

        header .container {
            max-width: 1250px;
            margin: 0 auto;
            height: 40px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav a {
            margin-left: 28px;
            font-weight: 600;
            color: #000;
            text-decoration: none;
            letter-spacing: .5px;
        }

        nav a:hover {
            opacity: .7;
        }

        .logo img {
            height: 200px;
        }

        main {
            max-width: 1250px;
            margin: 30px auto;
            padding: 0 20px;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <header>
        <div class="container">

            {{-- LOGO --}}
            <div class="logo" style="display:flex;align-items:center;gap:10px;">
                <img src="{{ asset('images/logo.png') }}" alt="PetRescue">
            </div>

            {{-- MENU --}}
            <nav>
                <a href="{{ url('/') }}">HOME</a>
                <a href="{{ route('animals.index') }}">ANIMAIS</a>
                <a href="{{ route('sobre') }}">SOBRE</a>

                @auth
                <a href="{{ route('animals.create') }}">CADASTRAR</a>

                <form method="POST" action="{{ route('adotante.logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:none;border:none;font-weight:600;margin-left:28px;cursor:pointer;">
                        SAIR
                    </button>
                </form>

                @else
                <a href="{{ route('adotante.login') }}">ENTRAR</a>
                @endauth
            </nav>

        </div>
    </header>

    {{-- CONTEÚDO --}}
    <main>
        @if (session('success'))
        <div style="background:#e6ffed;padding:12px;border-radius:6px;margin-bottom:18px;">
            {{ session('success') }}
        </div>
        @endif

        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer style="text-align:center;padding:40px 0;color:#666;font-size:14px;">
        <div>
            <p><strong>Contato:</strong> info@petrescue.com</p>
            <p><strong>Telefone:</strong> (14) 99432-5768</p>
        </div>
        <div class="social-icons">
            <i data-lucide="paw-print"></i>
            <i data-lucide="user"></i>
            <i data-lucide="heart"></i>
            <i data-lucide="instagram"></i>
            <i data-lucide="twitter"></i>
            <i data-lucide="facebook"></i>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>
