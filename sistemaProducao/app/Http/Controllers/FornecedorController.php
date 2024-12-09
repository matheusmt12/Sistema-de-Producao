<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Repositories\FornecedorRepository;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //

    protected $fornecedor;

    public function __construct(Fornecedor $fornecedor)
    {
        $this->fornecedor = $fornecedor;        
    }

    public function index(){
        $repository = new FornecedorRepository($this->fornecedor);

        $fornecedores = $repository->getAllPaginate();
        return view('Fornecedor/index', compact('fornecedores'));
    }

    public function create(){

        return view('Fornecedor/create');
    }

    public function save(Request $request){

        $repository = new FornecedorRepository($this->fornecedor);

        $repository->save($request);

        return redirect()->route('Fornecedor.inicio');
    }

}
