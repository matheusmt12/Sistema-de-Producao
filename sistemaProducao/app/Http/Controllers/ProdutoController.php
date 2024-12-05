<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Repositories\AbstractRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    //

    protected $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(){

        $repository = new ProdutoRepository($this->produto);

        $produtos = $repository->getAllPaginate();
        return view('Produto/index', compact('produtos'));
    }

    public function create(){
        return view('Produto/create');
    }

    public function save(Request $request){
        //dd($request->all());

        $repository = new AbstractRepository($this->produto);

        $repository->save($request);

        return redirect()->route('Produto.inicio'); 
    }

    public function addEstoque($id){

        $repository = new ProdutoRepository($this->produto);
        $produto = $repository->get($id);
        return view('Produto/estoque',compact('produto'));
    }


    public function salvarEstoque (Request $request){

        $request->validate($this->produto->rules());

        $repository = new ProdutoRepository($this->produto);

        $repository->addEstoque($request);

        return redirect()->route('Produto.inicio');
    }
}
