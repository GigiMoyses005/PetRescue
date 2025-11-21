@extends('layouts.app')

@section('title', 'Sobre - PetRescue')

@section('content')

<div style="max-width:900px;margin:0 auto;padding:30px 0;">

    <h1 style="font-size:34px;font-weight:700;margin-bottom:18px;color:#333;">
        Sobre o PetRescue
    </h1>

    <p style="font-size:18px;line-height:1.7;color:#555;margin-bottom:25px;">
        O <strong>PetRescue</strong> nasceu com o propósito de conectar animais resgatados a pessoas
        dispostas a oferecer um novo lar cheio de amor. Acreditamos que cada animal merece uma
        chance de recomeçar — e que a adoção responsável transforma vidas.
    </p>

    <h2 style="font-size:26px;font-weight:700;margin:30px 0 12px;color:#333;">
        Nossa missão
    </h2>

    <p style="font-size:18px;line-height:1.7;color:#555;margin-bottom:25px;">
        Facilitar o processo de adoção, tornando-o mais simples, transparente e acessível para todos.
        Queremos diminuir o número de animais abandonados e proporcionar um futuro mais digno e seguro
        para cada um deles.
    </p>

    <h2 style="font-size:26px;font-weight:700;margin:30px 0 12px;color:#333;">
        Como funciona
    </h2>

    <ul style="font-size:18px;line-height:1.7;color:#555;margin-bottom:25px;padding-left:22px;">
        <li>Organizações e resgatadores cadastram animais disponíveis.</li>
        <li>Interessados navegam, conhecem a história e enviam uma solicitação de adoção.</li>
        <li>Nossa equipe analisa a solicitação e entra em contato para finalizar o processo.</li>
    </ul>

    <h2 style="font-size:26px;font-weight:700;margin:30px 0 12px;color:#333;">
        Junte-se a nós
    </h2>

    <p style="font-size:18px;line-height:1.7;color:#555;margin-bottom:25px;">
        Seja adotando, divulgando ou apoiando este projeto — você faz parte da mudança.
        Cada gesto ajuda a construir um mundo onde nenhum animal seja deixado para trás.
    </p>

    <div style="margin-top:40px;text-align:center;">
        <a href="{{ route('animals.index') }}"
           style="background:#ff7f50;color:#fff;padding:14px 28px;font-size:18px;
           font-weight:600;border-radius:8px;text-decoration:none;">
            Ver Animais Disponíveis
        </a>
    </div>

</div>

@endsection
