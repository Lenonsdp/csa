@extends('layout.base')

@section('content')
<table class="table table-striped" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Especificação Técnica</th>
            <th>Categorias</th>
            <th class="actions">Ações</th>
            <th><a class="btn btn-success btn-xs" href="{{ route('addProduct') }}">Novo Produto</a></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->marca->descricao }}</td>
            <td>{{ $produto->especificacao_tecnica }}</td>
            <td>
            @foreach($produto->categorias as $categoria)
                    {{ $categoria->descricao }}
            @endforeach
            </td>
            <td class="actions">
                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
