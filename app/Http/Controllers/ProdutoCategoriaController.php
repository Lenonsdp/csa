<?php

namespace App\Http\Controllers;

use App\ProdutoCategorias;
use Illuminate\Http\Request;

class ProdutoCategoriaController extends Controller
{
	public function __contruct(ProdutoCategorias $produtoCategoria)
	{
		$this->produtoCategoria = $produtoCategoria;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$produtoCategorias = $this->produtoCategoria->all();

		return $produtoCategoria;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$produtoCategoria = $this->produtoCategoria->create($request->all());
		return $produtoCategoria;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$produtoCategoria = $this->produtoCategoria->find($id);

		return $produtoCategoria;
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
		$produtoCategoria = $this->produtoCategoria->find($id);
		$produtoCategoria->update($request->all());

		return $produtoCategoria;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$produtoCategoria = $this->produtoCategoria->find($id);
		$produtoCategoria->delete();

		return ['success' => true];
	}
}
