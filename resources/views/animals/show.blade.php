@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pet.css') }}">

<div class="pet-wrapper">

    {{-- FILTROS --}}
    <div class="filter-bar">
        <button class="filter active">Espécie</button>
        <button class="filter">Porte</button>
        <button class="filter">Idade</button>
        <button class="filter">Sexo</button>
        <button class="filter">Raça</button>
        <button class="filter">Localização ▾</button>
    </div>

    {{-- CONTEÚDO PRINCIPAL --}}
    <div class="pet-content">

        {{-- FOTO --}}
        <div class="pet-photo-box">
            <img src="{{ $animal->imagem ? asset('storage/'.$animal->imagem) : asset('images/placeholder.png') }}" class="pet-photo">
        </div>

        {{-- INFO --}}
        <div class="pet-info">
            <h1 class="pet-name">{{ $animal->nome }}</h1>

            <div class="pet-details">
                <p><strong>Espécie:</strong> {{ $animal->especie }}</p>
                <p><strong>Raça:</strong> {{ $animal->raca }}</p>
                <p><strong>Porte:</strong> {{ $animal->porte }}</p>
                <p><strong>Idade:</strong> {{ $animal->idade }} {{ $animal->tempo }}</p>
                <p><strong>Sexo:</strong> {{ $animal->sexo }}</p>
                <p><strong>Localização:</strong> {{ $animal->localizacao }}</p>
            </div>

            @auth
            <form action="{{ route('adoptions.store') }}" method="POST" class="adopt-form">
                @csrf
                <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                <button type="submit" class="btn-adotar">Quero Adotar!</button>
            </form>
            @else
            <a href="{{ route('adotante.login') }}" class="btn-adotar">Quero Adotar!</a>
            @endauth
        </div>

        {{-- DESCRIÇÃO --}}
        <div class="pet-description">
            <h2>Descrição</h2>

            <p>{{ $animal->descricao }}</p>
        </div>

    </div>
    <script>
        lucide.createIcons();
    </script>
    @endsection