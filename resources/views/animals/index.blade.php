{{-- resources/views/animals/index.blade.php --}}
@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: "Inter", sans-serif;
        background: #ffffff;
    }

    /* ======= FILTROS ======= */
    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin: 30px 0 40px 0;
    }

    .filter-btn {
        padding: 10px 28px;
        border-radius: 40px;
        border: 2px solid #00000033;
        background: white;
        font-size: 18px;
        cursor: pointer;
        transition: .2s;
    }

    .filter-btn:hover {
        background: #4C7CFB;
        color: white;
    }

    /* ======= GRID ======= */
    .animals-grid {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 30px;
    }

    .animal-card {
        background: white;
        border: 1px solid #cfcfcf;
        border-radius: 25px;
        padding: 16px;
        text-align: center;
        transition: .2s;
    }

    .animal-card:hover {
        transform: translateY(-6px);
        box-shadow: 0px 6px 16px rgba(0, 0, 0, 0.12);
    }

    .animal-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 20px;
    }

    .animal-name {
        margin-top: 12px;
        font-size: 20px;
        font-weight: 700;
    }

    .animal-desc {
        font-size: 14px;
        margin-top: 4px;
        color: #555;
    }

    .card-button {
        margin-top: 14px;
        padding: 10px 20px;
        border-radius: 30px;
        border: none;
        background: #F26D4A;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: .2s;
    }

    .card-button:hover {
        background: #d85a3b;
    }
</style>


{{-- ========== FILTROS ========== --}}
<form method="GET" action="{{ route('animals.index') }}" class="filters">

    <select name="especie" class="filter-btn" onchange="this.form.submit()">
        <option value="">Espécie</option>
        <option value="cachorro" {{ request('especie')=='cachorro' ? 'selected' : '' }}>Cachorro</option>
        <option value="gato" {{ request('especie')=='gato' ? 'selected' : '' }}>Gato</option>
        <option value="peixe" {{ request('especie')=='peixe' ? 'selected' : '' }}>Peixe</option>
        <option value="passaro" {{ request('especie')=='passaro' ? 'selected' : '' }}>Pássaro</option>
        <option value="roedor" {{ request('especie')=='roedor' ? 'selected' : '' }}>Roedor</option>
        <option value="reptil" {{ request('especie')=='reptil' ? 'selected' : '' }}>Réptil</option>
        <option value="marsupial" {{ request('especie')=='marsupial' ? 'selected' : '' }}>marsupial</option>
        <option value="coelho" {{ request('especie')=='coelho' ? 'selected' : '' }}>Coelho</option>
    </select>

    <select name="porte" class="filter-btn" onchange="this.form.submit()">
        <option value="">Porte</option>
        <option value="pequeno" {{ request('porte')=='pequeno' ? 'selected' : '' }}>Pequeno</option>
        <option value="medio" {{ request('porte')=='medio' ? 'selected' : '' }}>Médio</option>
        <option value="grande" {{ request('porte')=='grande' ? 'selected' : '' }}>Grande</option>
        <option value="gigante" {{ request('porte')=='gigante' ? 'selected' : '' }}>Gigante</option>
        <option value="muito pequeno" {{ request('porte')=='muito_pequeno' ? 'selected' : '' }}>Muito Pequeno</option>
        <option value="medio/grande" {{ request('porte')=='medio/grande' ? 'selected' : '' }}>Médio/Grande</option>
    </select>

   <select name="idade" class="filter-btn" onchange="this.form.submit()">
    <option value="">Idade</option>

    {{-- Semanas --}}
    <option value="10 semanas" {{ request('idade')=='10 semanas' ? 'selected' : '' }}>10 semanas</option>
    <option value="12 semanas" {{ request('idade')=='12 semanas' ? 'selected' : '' }}>12 semanas</option>

    {{-- Meses --}}
    <option value="6 meses" {{ request('idade')=='6 meses' ? 'selected' : '' }}>6 meses</option>
    <option value="8 meses" {{ request('idade')=='8 meses' ? 'selected' : '' }}>8 meses</option>

    {{-- Anos --}}
    <option value="1 ano" {{ request('idade')=='1 ano' ? 'selected' : '' }}>1 ano</option>
    <option value="2 anos" {{ request('idade')=='2 anos' ? 'selected' : '' }}>2 anos</option>
    <option value="3 anos" {{ request('idade')=='3 anos' ? 'selected' : '' }}>3 anos</option>
    <option value="4 anos" {{ request('idade')=='4 anos' ? 'selected' : '' }}>4 anos</option>
    <option value="5 anos" {{ request('idade')=='5 anos' ? 'selected' : '' }}>5 anos</option>
    <option value="6 anos" {{ request('idade')=='6 anos' ? 'selected' : '' }}>6 anos</option>
    <option value="7 anos" {{ request('idade')=='7 anos' ? 'selected' : '' }}>7 anos</option>
    <option value="8 anos" {{ request('idade')=='8 anos' ? 'selected' : '' }}>8 anos</option>
    <option value="9 anos" {{ request('idade')=='9 anos' ? 'selected' : '' }}>9 anos</option>
    <option value="10 anos" {{ request('idade')=='10 anos' ? 'selected' : '' }}>10 anos</option>
</select>


    <select name="sexo" class="filter-btn" onchange="this.form.submit()">
        <option value="">Sexo</option>
        <option value="M" {{ request('sexo')=='macho' ? 'selected' : '' }}>Macho</option>
        <option value="F" {{ request('sexo')=='femea' ? 'selected' : '' }}>Fêmea</option>
    </select>

    <input name="raca" class="filter-btn" type="text" placeholder="Raça"
        value="{{ request('raca') }}"
        onchange="this.form.submit()">

    <input name="localizacao" class="filter-btn" type="text" placeholder="Localização"
        value="{{ request('localizacao') }}"
        onchange="this.form.submit()">

</form>


{{-- ========== GRID DE ANIMAIS ========== --}}
<div class="animals-grid">
    @foreach ($animals as $animal)
    <div class="animal-card">

        <img src="{{ $animal->imagem ? asset('storage/' . $animal->imagem) : asset('images/no-image.png') }}"
            alt="{{ $animal->nome }}">

        <div class="animal-name">{{ $animal->nome }}</div>

        <div class="animal-desc">
            Espécie: {{ ucfirst($animal->especie) ?? 'N/A' }},
            Porte: {{ ucfirst($animal->porte) ?? 'N/A' }}
        </div>

        <a href="{{ route('animals.show', $animal->id) }}">
            <button class="card-button">Ver Detalhes</button>
        </a>

    </div>
    @endforeach
</div>


<div style="max-width: 1200px; margin: 40px auto; text-align:center;">
    {{ $animals->links() }}
</div>

<script>
    lucide.createIcons();
</script>

@endsection