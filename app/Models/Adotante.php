<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Adotante extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome','cpf','telefone','email','endereco','password'
    ];

    protected $hidden = [
        'password','remember_token',
    ];

    public function adoptions()
    {
        return $this->hasMany(Adoption::class, 'adotante_id');
    }
}
