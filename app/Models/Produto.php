<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    public function User(){
        return $this->hasOne('App\Models\User');
    }
    use HasFactory;
    protected $fillable = [
        'nome',
        'foto',
        'valor',
        'descricao',
        'situacao'
    ];
}
