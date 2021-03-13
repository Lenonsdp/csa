<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
	protected $fillable = [
		'nome',
		'status',
		'marca_id',
		'especificacao_tecnica',
		'categoria_id'
	];

	public function rules()
	{
		return [
			'nome' => 'required',
			'marca_id' => 'required|integer'
		];
	}

	public function feedback()
	{
		return [
			'required' => 'O campo :attribute é obrigatório',
		];
	}

	public function marca()
	{
		return $this->belongsTo('App\Marca');
	}

	public function categorias()
	{
		return $this->belongsToMany('App\Categoria', 'produto_categorias');
	}
}
