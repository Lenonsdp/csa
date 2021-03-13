<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	protected $fillable = [
		'descricao',
		'status'
	];

	public function rules()
	{
		return [
			'descricao' => 'required|unique:marcas',
			'status' => 'boolean'
		];
	}

	public function feedBack()
	{
		return [
			'required' => 'O campo :attribute é obrigatório',
			'descricao.unique' => 'O nome da marca já existe'
		];
	}

	public function produtos()
	{
		return $this->hasMany('App\Produto');
	}
}
