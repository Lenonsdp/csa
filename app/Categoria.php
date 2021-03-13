<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $fillable = [
		'descricao',
		'status'
	];

	public function rules()
	{
		return [
			'descricao' => 'required|unique:categorias',
			'status' => 'boolean'
		];
	}

	public function feedBack()
	{
		return [
			'required' => 'O campo :attribute é obrigatório',
			'descricao.unique' => 'O nome da categoria já existe'
		];
	}

	public function produtos()
	{
		return $this->belongsToMany('App\Produto');
	}
}
