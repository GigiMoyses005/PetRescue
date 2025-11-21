@component('mail::message')
Olá **{{ $adoption->adotante->nome }}**,

O status da solicitação para **{{ $adoption->animal->nome }}** foi atualizado para **{{ $adoption->status }}**.

@if($adoption->status == 'aprovado')
Data de adoção: {{ $adoption->data_adocao }}
@endif

Obrigado,<br>
PetRescue
@endcomponent
