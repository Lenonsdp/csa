@extends('layout.base')

@section('content')

<div id="form">
	@if(isset($produto->id))
		<form method="post" action="{{ route('update', $produto->id) }}">
			@csrf
			@method('PUT')
	@else
		<form method="post" action="{{ route('create') }}">
			@method('POST')
			@csrf
	@endif
		<input type="hidden" name="produto_id" value="{{ $produto->id ?? old('id') }}">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome">
			{{ $errors->has('nome') ? $errors->first('nome') : '' }}
		</div>

		<div class="form-group">
			<label for="especificacao_tecnica">Especificação tecnica</label>
			<textarea type="text" class="form-control" name="especificacao_tecnica" rows="6" placeholder="Especificaçao">{{ $produto->especificacao_tecnica ?? old('especificacao_tecnica') }}</textarea>
			{{ $errors->has('especificacao_tecnica') ? $errors->first('especificacao_tecnica') : '' }}
		</div>

		<div class="form-group">
			<label for="marca_id">Marcas</label>
			<select class="form-control" name="marca_id" id="marca_id">
				<option value="">-- Selecione uma Marca --</option>

				@foreach($marcas as $marca)
					<option value="{{ $marca->id }}" {{ ($produto->marca_id ?? old('marca_id')) == $marca->id ? 'selected' : '' }}>{{ $marca->descricao }}</option>
				@endforeach
			</select>
			{{ $errors->has('marca_id') ? 'O campo marca é obrigatório' : '' }}
		</div>
		<label for="categoria_ids">Categorias</label>
		<div class="form-group">
			<select class="standardSelect" id="categoria_ids" multiple="multiple" name="categoria_ids[]" placeholder="Selecione...">
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}" {{ isset($produto) ? (in_array($categoria->id, $produto->categoria_ids) ? 'selected' : '') : '' }}>{{ $categoria->descricao }}</option>
				@endforeach
			</select>
		</div>
		{{ $errors->has('categoria_ids') ? 'Informe ao menos uma categoria' : '' }}

		<div id="actions">
			<button class="btn btn-success btn-btn-md pull-left" id="create" type="submit">Salvar</button>
			<a href="{{ route('index') }}" class="btn btn-md btn-secondary pull-left">Cancelar</a>
		</div>
	<form>
</div>
@endsection
