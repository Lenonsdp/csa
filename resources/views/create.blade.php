@extends('layout.base')

@section('content')

<div id="form">
    @if(false)
        <form method="post" action="{{ route('update', ['produto' => 'teste']) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('create') }}">
            @method('POST')
            @csrf
    @endif

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome">
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>

        <div class="form-group">
            <label for="especificacao_tecnica">Especificação tecnica</label>
            <textarea type="text" class="form-control" name="especificacao_tecnica" rows="6" value="{{ $produto->especificacao_tecnica ?? old('especificacao_tecnica') }}" placeholder="Especificaçao"></textarea>
            {{ $errors->has('especificacao_tecnica') ? $errors->first('especificacao_tecnica') : '' }}
        </div>

        <div class="form-group">
            <label for="marca">Marcas</label>
            <select class="form-control" name="marca" id="marca">
                <option>-- Selecione uma Marca --</option>

                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->descricao }}</option>
                @endforeach
            </select>
            {{ $errors->has('marca') ? $errors->first('marca_id') : '' }}
        </div>

        <label for="categorias">Categorias</label>
        <div class="form-group">
            <select class="standardSelect" id="categorias" multiple="multiple" name="categorias" placeholder="Selecione...">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                @endforeach
            </select>
            {{ $errors->has('categorias') ? $errors->first('categorias') : '' }}
        </div>
        <div id="actions">
            <button class="btn btn-success btn-btn-md pull-left" id="create" type="submit">Salvar</button>
            <a href="{{ route('index') }}" class="btn btn-md btn-secondary pull-left">Cancelar</a>
        </div>
    <form>

</div>
@endsection
