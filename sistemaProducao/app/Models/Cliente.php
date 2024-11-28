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


    public function rules()
    {
        return [
            'nome' => 'required',
            'cnpj' => 'required|unique:clientes',
            'razao_social' => 'required',
            'ramo_ativo' => 'required',
            'nome_responsavel' => 'required',
            'telefone' => 'required',
            'rua' => 'required',
            'cidade' => 'required',
            'num_casa' => 'required',
            'estado' => 'required'
        ];
    }

    public function feedback(){
        return [
            'required' => 'O campo :attribute é requerido',
            'unique' => 'Esse :attribute já esta cadastrado no sistema'
        ];
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }
}
