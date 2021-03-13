<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
	public function __construct(Marca $marca)
	{
		$this->marca = $marca;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$marcas = $this->marca->all();
		return $marcas;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate($this->marca->rules(), $this->marca->feedBack());

		$marca = $this->marca->create($request->all());
		return $marca;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$marca = $this->marca->with('produtos')->find($id);
		if (is_null($marca)) {
			return response('error', 404);
		}

		return $marca;
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
		$marca = $this->marca->find($id);
		if (is_null($marca)) {
			return response('error', 404);
		}
		$marca->update($request->all());

		return $marca;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Integer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$marca = $this->marca->find($id);
		if (is_null($marca)) {
			return response('error', 404);
		}
		$marca->delete();

		return \response('success', 204);
	}
}
