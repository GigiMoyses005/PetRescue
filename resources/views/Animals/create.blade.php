@extends('layouts.app')

@section('content')
<style>
    .form-container {
        background: #fdeaea;
        padding: 40px;
        border-radius: 18px;
        max-width: 1100px;
        margin: 40px auto;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 25px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 50px;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    textarea {
        height: 120px;
    }

    .upload-box {
        border: 2px dashed #bbb;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        margin-top: 10px;
        background: white;
    }

    .btn-submit {
        background: #ff7a5c;
        color: white;
        font-size: 22px;
        font-weight: bold;
        padding: 16px 40px;
        border-radius: 40px;
        border: none;
        display: block;
        margin: 35px auto 0;
        cursor: pointer;
        transition: .2s;
    }

    .btn-submit:hover {
        background: #ff6a4a;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
</style>
@if ($errors->any())
    <div style="color:red; background:#ffecec; padding:15px; border-radius:8px; margin-bottom:20px;">
        <strong>Erros ao salvar:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-container">

    <h1 class="form-title">Cadastrar Novo Animal</h1>

    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-grid">

            {{-- Nome --}}
            <div>
                <label>Nome</label>
                <input type="text" name="nome" required>
            </div>

            {{-- Raça --}}
            <div>
                <label>Raça</label>
                <input type="text" name="raca">
            </div>

            {{-- Espécie --}}
            <div>
                <label>Espécie</label>
                <input type="text" name="especie">
            </div>

            {{-- Idade --}}
            <div>
                <label>Idade</label>
                <input type="text" name="idade">
            </div>

            {{-- Porte --}}
            <div>
                <label>Porte</label>
                <input type="text" name="porte">
            </div>

            {{-- Local --}}
            <div>
                <label>Local</label>
                <input type="text" name="local">
            </div>

            {{-- Sexo --}}
            <label>Sexo</label>
            <select name="sexo">
                <option value="M">Macho</option>
                <option value="F">Fêmea</option>
                <option value="U">Indefinido</option>
            </select>


            {{-- Descrição --}}
            <div>
                <label>Descrição</label>
                <textarea name="descricao"></textarea>
            </div>

        </div>

        {{-- Upload de Foto --}}
        <div style="margin-top: 25px;">
            <label>Upload de Foto</label>
            <div class="upload-box">
                <input type="file" name="imagem" accept="image/*" style="display:none" id="fileInput">
                <span onclick="document.getElementById('fileInput').click()">
                    📷 Clique ou arraste para enviar fotos
                </span>
            </div>
        </div>

        {{-- Botão --}}
        <button class="btn-submit" type="submit">Cadastrar Animal</button>

    </form>

</div>

@endsection