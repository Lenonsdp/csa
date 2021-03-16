@extends('layout.base')

@section('content')


<div class="menu">
    <ul>
        <li><a href="{{ route('index') }}">Voltar</a></li>
    </ul>
</div>

<div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right: auto;">
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
                <label for="exampleInputPassword1">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>

            <div class="form-group">
                <label for="marca">Marcas</label>
                {{-- <select class="form-control" name="marca">
                    <option>-- Selecione uma Marca --</option>

                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ ($produto->marca_id ?? old('marca_id')) == $marca->id ? 'selected' : '' }} >{{ $marca->descricao }}</option>
                    @endforeach
                </select>
               {{ $errors->has('marca_id') ? $errors->first('marca_id') : '' }} --}}
                <select class="form-control" id="marca">
                    <option>Nike</option>
                    <option>Puma</option>
                    <option>Adidas</option>
                    <option>Columbia</option>
                    <option>Tommy</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Especificação tcnica</label>
                <input type="text" class="form-control" name="especificacao_tecnica" value="{{ $produto->especificacao_tecnica ?? old('especificacao_tecnica') }}" placeholder="Especificaçao">
                {{ $errors->has('especificacao_tecnica') ? $errors->first('especificacao_tecnica') : '' }}
            </div>

            <button type="submit">Salvar</button>
        <form>
    </div>
</div>
@endsection
