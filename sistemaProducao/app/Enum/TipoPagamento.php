<?php

namespace App\Enum;

enum TipoPagamento: string
{
    case PIX = 'PIX';
    case DEBITO = 'DEBITO';
    case CREDITO = 'CREDITO';
}
