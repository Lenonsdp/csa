<?php

namespace App\Http\Controllers;

use App\Produto;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
	public function __construct(Produto $produto)
	{
		$this->produto = $produto;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produtos = $this->produto->with('marca')->with('categorias')->get();
		return $produtos;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate($this->produto->rules(), $this->produto->feedback());

		$parseProduct = $request->all();
		$idsCategorias = $parseProduct['categoria_id'];
		unset($parseProduct['categoria_id']);

		$produto = $this->produto->create($parseProduct);
		$produto->categorias()->attach($idsCategorias);

		return $produto;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$produto = $this->produto->with('marca')->with('categorias')->find($id);

		if (is_null($produto)) {
			return response('error', 404);
		}

		return $produto;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$produto = $this->produto->find($id);

		if (is_null($produto)) {
			return response('error', 404);
		}

		$produto->update($request->all());

		return $produto;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$produto = $this->produto->find($id);

		if (is_null($produto)) {
			return response('error', 404);
		}
		$produto->delete();

		return response('success', 204);
	}
}
