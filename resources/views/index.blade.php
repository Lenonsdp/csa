@extends('layout.base')

@section('content')
<table class="table table-striped" cellspacing="0" cellpadding="0">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Marca</th>
			<th class="hidden-mobile">Especificação Técnica</th>
			<th class="hidden-mobile">Categorias</th>
			<th class="actions">Ações</th>
			<th class="hidden-mobile"><a class="btn btn-success btn-md" id="btn_add" href="{{ route('addProduct') }}">Novo Produto</a></th>
			<th style="display:none;" id="th_add_mobile"><a class="btn btn-success btn-md" href="{{ route('addProduct') }}">+</a></th>
		</tr>
	</thead>
	<tbody>
	@foreach ($produtos as $produto)
		<tr>
			<td>{{ $produto->id }}</td>
			<td>{{ $produto->nome }}</td>
			<td>{{ $produto->marca->descricao }}</td>
			<td class="hidden-mobile">{{ $produto->especificacao_tecnica }}</td>
			<td class="hidden-mobile">
			@foreach($produto->categorias as $key => $categoria)
					|{{ $categoria->descricao }}
			@endforeach
			</td>
			<td class="actions">
				<a class="btn btn-warning btn-xs" href="{{ route('editProduct', $produto->id) }}" title="Editar"><i class="fas fa-edit"></i></a>
				<a class="btn btn-danger btn-xs delete"  href="#" data-id="{{ $produto->id }}" title="Excluir"><i class="fas fa-trash-alt"></i></a>
			</td>
			<td></td>
		</tr>
	@endforeach
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title"></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="modal-body"></div>
	  <div class="modal-footer">
		<a type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
		<a type="button" class="btn btn-primary" id="comfirmDelete">Ok</a>
	  </div>
	</div>
  </div>
</div>

@endsection
