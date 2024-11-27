<?php

namespace App\Enum;

enum StatusPedido: string {
    case ENTRGUE = 'ENTREGUE' ;
    case CANCELADO = 'CANCELADO';
    case ACAMINHO = 'A CAMINHO';
}