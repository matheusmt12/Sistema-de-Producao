<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome','valor', 'estoque'];


    public function rules(){

        return [
            'produto.*.quantidade' => [function($attribute,$value,$fail){
                $produtoId = explode('.', $attribute)[1];
                $produto = Produto::find($produtoId);

                if ($produto->estoque < $value) {
                    # code...
                    return $fail("A quantidade solicitada para o produto '{$produto->nome}' excede o estoque disponível ({$produto->estoque}).");
                }
            }]
        ];
    }


    public function produtosPedidos(){
        return $this->hasMany('id_produto');
    }

}
