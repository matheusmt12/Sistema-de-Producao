<?php

namespace App\Http\Controllers;

use App\Enum\StatusPedido;
use App\Enum\TipoPagamento;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use App\Repositories\AbstractRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\PedidoProdutoRepository;
use App\Repositories\PedidoRepository;
use App\Repositories\ProdutoRepository;
use DateTime;
use Illuminate\Http\Request;


class PedidoController extends Controller
{


    protected $pedido;
    protected $cliente;
    protected $produto;
    protected $pedidoProduto;

    public function __construct(Pedido $pedido, Cliente $cliente, Produto $produto, PedidoProduto $pedidoProduto)
    {
        $this->pedido = $pedido;
        $this->cliente = $cliente;
        $this->produto = $produto;
        $this->pedidoProduto = $pedidoProduto;
    }

    public function index()
    {
        $repositoryPedido = new PedidoRepository($this->pedido);
        $repositoryPedido->verificarStatus();
        $pedidos = $repositoryPedido->getPaginate('cliente');
        // $dataHoje = date_create();
        // $dataHoje = date_format($dataHoje,'Y-m-d H:i');
        //if(strtotime($dataEntrega) > strtotime( $dataHoje)) dd($pedidos[1]);
        //dd($pedidos);
        return view('Pedido/index', compact('pedidos'));
    }

    public function createPedido()
    {

        $repositoryCliente = new ClienteRepository($this->cliente);
        $repositoryProduto = new ProdutoRepository($this->produto);
        $tipos = array_map(fn($tipo) => $tipo->value, TipoPagamento::cases());
        $clientes = $repositoryCliente->getAll();
        $produtos = $repositoryProduto->getAll();
        $dados = (object)['clientes' => $clientes, 'tipos' => $tipos, 'produtos' => $produtos];
        return view('Pedido/Create', compact('dados'));
    }

    public function save(Request $request)
    {
        //validacao dos dados 

        $request->validate($this->pedido->rules(), $this->pedido->feedback());

        $repositoryPedido = new PedidoRepository($this->pedido);
        $repositoryPedidoProduto = new PedidoProdutoRepository($this->pedidoProduto);
        $repositoryProduto = new ProdutoRepository($this->produto);

        //salvar o pedido
        $pedido = $repositoryPedido->save($request);

        //atualizar estoque do produto
        $produtos = $request->input('produto', []);
        $repositoryProduto->atualizarEstoque($produtos);

        //salvando o pedido do produto
        $repositoryPedidoProduto->savePedido($produtos, $pedido->id);

        return redirect()->route('Pedido.inicio');
    }

    public function detalhes($id)
    {

        $repository = new PedidoRepository($this->pedido);
        $pedido = $repository->byId($id, 'cliente');
        return view('Pedido/detalhe', compact('pedido'));
    }

    public function finalizar($id)
    {
        $repository = new PedidoRepository($this->pedido);
        $pedido = $repository->byId($id, 'cliente');
        $status = array_map(fn($stat) => $stat->value, StatusPedido::cases());

        $objPedido = (object)['pedido' => $pedido, 'status' => $status];
        return view('Pedido/finalizar', compact('objPedido'));
    }

    public function concluirPedido(Request $request)
    {

        $repository = new PedidoRepository($this->pedido);
        $repository->finalizarPedido($request);

        return redirect()->route('Pedido.inicio');
    }
}
