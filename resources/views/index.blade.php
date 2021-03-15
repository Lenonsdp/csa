@extends('layout.base')

@section('content')
<div class="row">
	<div class="col-md-12" id="header">
		<img src="{{ asset('images/logo.png') }}" alt="Logo tabex" width="100" height="60">
	</div>
</div>
<div class="row" id="breadCrumb"></div>
<div class="row" id="containerProduct">
	<table class="table table-striped" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Marca</th>
				<th>Especificação Técnica</th>
				<th class="actions">Ações</th>
				<th><a class="btn btn-success btn-xs" href="view.html">Novo Produto</a></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($produtos as $produto)
			<tr>
				<td>{{ $produto->id }}</td>
				<td>{{ $produto->nome }}</td>
				<td>{{ $produto->marca->descricao }}</td>
				<td>{{ $produto->especificacao_tecnica }}</td>
				<td class="actions">
					<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
					<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
				</td>
				<td></td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection
