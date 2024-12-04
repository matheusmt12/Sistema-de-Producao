<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;

    protected $fillable = ['id_pedido', 'id_produto'];


    public function rules(){
        return [
            
        ];
    }



    public function pedido(){
        return $this->belongsTo('id_pedido');
    }

    public function produto(){
        return $this->belongsTo('id_produto');
    }
}
