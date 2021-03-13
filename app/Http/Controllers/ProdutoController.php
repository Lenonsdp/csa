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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$produto = $this->produto->create($request->all());
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
		$produto = $this->produto->find($id);

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
		$produto->update($request->all());

		return $produto;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Produto  $produto
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Produto $produto)
	{
		$produto = $this->produto->delete();

		return ['succes' => true];
	}
}
