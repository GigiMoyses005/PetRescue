<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $fillable = [
        'animal_id','adotante_id','status','observacoes','data_adocao'
    ];

    public function animal(){
        return $this->belongsTo(Animal::class);
    }

    public function adotante(){
        return $this->belongsTo(Adotante::class,'adotante_id');
    }
}
