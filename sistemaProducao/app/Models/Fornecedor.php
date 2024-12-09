<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_contato',
        'rua',
        'cidade',
        'estado',
        'telefone',
        'cnpj',
        'razao_social'
    ];
}
