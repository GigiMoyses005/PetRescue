<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetRescue - Adoção</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>

        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100% !important;
            height: 40px !important;
            padding: 20px 40px;
            border-bottom: 1px solid #ddd;
            box-shadow: #000 0px 4px 6px -6px;
        }
        header nav a {
            margin-left: 30px;
            text-decoration: none;
            color: #000;
            font-weight: 600;
        }
        .hero {
            padding: 80px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .hero-text h3 {
            color: white;
            font-size: 20px;
            letter-spacing: 1px;
        }
        .hero-text h1 {
            color: white;
            font-size: 50px;
            margin: 0;
            line-height: 1.1;
        }
        .hero-text p {
            color: white;
            margin-top: 20px;
            font-size: 16px;
            max-width: 350px;
        }
        .btn {
            margin-top: 30px;
            background: #9D3508;
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            font-weight: 700;
        }
        footer {
            padding: 40px;
            background: #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: #000 0px -4px 6px -6px;
        }
        .social-icons i {
            font-size: 24px;
            margin-left: 20px;
        }
        .animals-img img {
            height: 300px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo" style="display:flex; align-items:center; gap:10px;">
        <img src="{{ asset('images/logo.png') }}" alt="PetRescue">
    </div>
    <nav>
        <a href="{{ url('/') }}">HOME</a>
        <a href="{{ route('animals.index') }}">ANIMAIS</a>
        <a href="{{ url('/sobre') }}">SOBRE</a>
        <a href="{{ route('adotante.login') }}">ENTRAR</a>
    </nav>
</header>

<section class="hero" style="position:relative; display:inline-block; width:100%;">
    <img src="{{ asset('images/BannerHome.png') }}" alt="Banner Home" style="width:100%; height:auto; display:block;">

    <a href="{{ url('/sobre') }}" style="
        position:absolute;
        left:150px;
        top:77%;
        transform:translateY(-50%);
        background:#a54f1e;
        color:white;
        padding:15px 35px;
        border-radius:30px;
        font-size:18px;
        font-weight:700;
        text-decoration:none;
        font-family:'Montserrat', sans-serif;
    ">Saiba Mais</a>
</section>

<footer>
    <div>
        <p><strong>Contato:</strong> info@petrescue.com</p>
        <p><strong>Telefone:</strong> (14) 99432-5768</p>
    </div>
    <div class="social-icons">
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
