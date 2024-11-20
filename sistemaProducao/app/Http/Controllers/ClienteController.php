<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\RepositoryCliente;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function getCliente(){

        $repository = new RepositoryCliente($this->cliente);

        $clientes= $repository->getAll();

        return view('cliente/index', compact('clientes'));
        
    }


    public function save(){

        $request = ([
            'nome' => 'pague menos',
            'cnpj' => '123456789',
            'rua' => 'Maria Soares',
            'razao_social' => 'não tem',
            'ramo_ativo' => 'farmacia',
            'nome_responsavel' => 'Matheus Souza',
            'telefone' => '79998421320',
            'cidade' => 'campo do brito',
            'num_casa' => 63,
            'estado' => 'SE'
        ]);

        $repository = new RepositoryCliente($this->cliente);

        $save = $repository->save($request);

        return view('cliente/Create', compact('save'));
    }
}
