@extends('site.layout.app')

@section('title', 'Novo Cliente')

@section('nav')
<div class="card">
    <h5 class="card-header">Cadastrar Cliente</h5>
    <div class="card-body">
        <form action="{{route ('Cliente.save')}}" method="post">
            @csrf
            <form>
                <div class="row">
                    <div class="col">
                        <label for="nomeEmpresa">Nome da Empresa</label>
                        <input type="text" class="form-control" id="nomeEmpresa" name="nome" placeholder="Nome da empresa">
                        <small class="form-text text-muted">Informe o nome da empresa</small>
                    </div>
                    <div class="col">
                        <label for="nomeRepresentante">Nome do Responsavel</label>
                        <input type="text" class="form-control" id="nomeRepresentante" name="nome_responsavel" placeholder="Nome do Responsavel">
                        <small class="form-text text-muted">Informe o nome do responsavel</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="cnpjCliente">CNPJ</label>
                        <input type="text" class="form-control" id="cnpjCliente" name="cnpj" placeholder="CNPJ (mudar para tamplete de cnpj">
                        <small class="form-text text-muted">Informe o Cnpj</small>
                    </div>
                    <div class="col">
                        <label for="telefoneCliente">Telefone</label>
                        <input type="text" class="form-control" id="telefoneCliente" name="telefone" placeholder="Mudar para templete de telefone">
                        <small class="form-text text-muted">Informe o número de telefone</small>
                    </div>
                </div>
                <!--  -->
                <div class="row">
                    <div class="col">
                        <label for="razaosocial">Razão Social</label>
                        <input type="text" class="form-control" id="razaosocial" name="razao_social" placeholder="Razão social">
                        <small class="form-text text-muted">Informe a razão social</small>
                    </div>
                    <div class="col">
                        <label for="ramoativo">Ramo ativo</label>
                        <input type="text" class="form-control" id="ramoativo" name="ramo_ativo" placeholder="Ramo Ativo">
                        <small class="form-text text-muted">Descreva o ramo ativo</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="cidadeCliente">Cidade</label>
                        <input type="text" class="form-control" id="cidadeCliente" name="cidade" placeholder="Cidade">
                        <small class="form-text text-muted">Informe a cidade</small>
                    </div>
                    <div class="col">
                        <label for="estadoCliente">Estado</label>
                        <input type="text" class="form-control" id="estadoCliente" name="estado" maxlength="2">
                        <small class="form-text text-muted">Informe o número de telefone</small>
                    </div>
                    <div class="col">
                        <label for="ruaCliente">Rua</label>
                        <input type="text" class="form-control" id="ruaCliente" name="rua">
                        <small class="form-text text-muted">Informe o nome da rua</small>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="numeroCasa">°n</label>
                            <input type="numper" class="form-control" name="num_casa" id="cnpjCliente">
                            <small class="form-text text-muted">Informe o numero da casa</small>
                        </div>
                    </div>
                </div>
                <!--  -->
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </form>
    </div>
</div>

@endsection