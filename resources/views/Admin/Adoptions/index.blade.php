@extends('layouts.app')

@section('title','Solicitação de Adoção')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .panel {
        background: #FDEEEF;
        border-radius: 18px;
        padding: 26px;
        max-width: 1180px;
        margin: 24px auto;
        box-shadow: 0 2px 0 rgba(0, 0, 0, 0.06);
    }

    .page-title {
        font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
        font-weight: 800;
        font-size: 56px;
        margin: 0 0 18px 0;
    }

    .adoptions-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #b5b5b5;
        background: transparent;
    }

    .adoptions-table thead th {
        background: #e6e6e6;
        padding: 16px 12px;
        font-weight: 800;
        text-align: left;
        border: 1px solid #b5b5b5;
    }

    .adoptions-table td {
        padding: 18px 12px;
        border: 1px solid #b5b5b5;
        vertical-align: middle;
        font-size: 16px;
    }

    .status {
        font-weight: 800;
        padding: 6px 12px;
        border-radius: 6px;
        display: inline-block;
    }

    .status.pendente {
        color: #d29900;
    }

    .status.adotado {
        color: #14b400;
    }

    .status.recusado {
        color: #e30000;
    }

    .status.aval {
        color: #0047ff;
    }

    .actions i {
        font-size: 20px;
    }

    /* small responsive */
    @media (max-width:900px) {
        .page-title {
            font-size: 40px
        }

        .adoptions-table td,
        .adoptions-table th {
            padding: 12px 8px
        }
    }
</style>

<div class="panel">
    <h1 class="page-title">Solicitação de Adoção</h1>

    <div style="overflow:auto;">
        <table class="adoptions-table">
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Adotante</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $adoption)

                <tr>
                    <td>{{ $adoption->animal->nome ?? '—' }}</td>
                    <td>{{ $adoption->user->name ?? ($adoption->adotante_nome ?? '—') }}</td>
                    <td>{{ optional($adoption->created_at)->format('d/m/Y') }}</td>
                    <td>
                        @php $s = strtolower($adoption->status ?? 'pendente'); @endphp
                        <span class="status {{ $s }}">
                            @if($s == 'pendente') Pendente
                            @elseif($s == 'adotado') Adotado
                            @elseif($s == 'recusado') Recusado
                            @elseif(in_array($s,['em_avaliacao','avaliacao','em avaliacao'])) Em Avaliação
                            @else {{ ucfirst($s) }}
                            @endif
                        </span>
                    </td>
                    <td class="actions">
                        {{-- Exemplos de ações: aceitar, recusar, apagar, atualizar --}}
                    <td class="actions">

                        @if($adoption->status === 'pendente')
                        <form action="{{ route('admin.adoptions.approve', $adoption->id) }}" method="POST" style="display:inline">
                            @csrf
                            <button title="Aceitar" style="border:none;background:none;cursor:pointer">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>

                        <form action="{{ route('admin.adoptions.reject', $adoption->id) }}" method="POST" style="display:inline;margin-left:8px">
                            @csrf
                            <button title="Recusar" style="border:none;background:none;cursor:pointer">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                        @endif

                        <form action="{{ route('admin.adoptions.destroy', $adoption->id) }}" method="POST" style="display:inline;margin-left:8px">
                            @csrf
                            @method('DELETE')
                            <button title="Remover" style="border:none;background:none;cursor:pointer;color:#333">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </td>

                    @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:28px;">Nenhuma solicitação encontrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection