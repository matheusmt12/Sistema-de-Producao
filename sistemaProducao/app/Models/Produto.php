<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'valor', 'estoque'];


    public function rules()
    {

        return [
            'quantidade' => [function($attribute, $value,$fail){
                if (!isset($value)) {
                    # code...
                    $fail('É nescessario ter pelo menos 1 para ser acrescentado');
                    return;
                }
                if($value <= 0 )
                $fail('O valor tem que ser maior que 0');
            }]
        ];
    }

    public function feedback()
    {
        [
            'quantidade.min' => 'É nescessario ter pelo menos 1 para ser acrescentado'
        ];
    }

    public function produtosPedidos()
    {
        return $this->hasMany('id_produto');
    }
}
