<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
	public function __construct(Categoria $categoria)
	{
		$this->categoria = $categoria;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$categorias = $this->categoria->all();
		return $categorias;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->headers->set('accept', 'application/json');
		$request->validate($this->categoria->rules(), $this->categoria->feedBack());

		$categoria = $this->categoria->create($request->all());
		return $categoria;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param Integer
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$categoria = $this->categoria->find($id);
		if (is_null($categoria)) {
			return response('error', 404);
		}

		return $categoria;
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
		$request->headers->set('accept', 'application/json');
		$categoria = $this->categoria->find($id);

		if (is_null($categoria)) {
			return response('error', 404);
		}
		$categoria->update($request->all());

		return $categoria;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$categoria = $this->categoria->find($id);

		if (is_null($categoria)) {
			return response('error', 404);
		}

		$categoria->delete();

		return response('success', 204);
	}
}
