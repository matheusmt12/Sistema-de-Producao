<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;

    protected $fillable = ['id_pedido', 'id_produto','quantidade'];


    public function rules(){
        return [
            
        ];
    }



    public function pedido(){
        return $this->belongsTo(Pedido::class,'id_pedido','id');
    }

    public function produto(){
        return $this->belongsTo(Produto::class,'id_produto','id');
    }
}
