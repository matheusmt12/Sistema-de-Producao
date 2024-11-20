<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cnpj',
        'razao_social',
        'ramo_ativo',
        'nome_responsavel',
        'telefone',
        'rua',
        'cidade',
        'num_casa',
        'estado'
    ];


    public function pedidos(){
        return $this->hasMany(Pedido::class,'id_cliente');
    }
}
