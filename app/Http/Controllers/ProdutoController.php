<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
	public function __construct(Produto $produto)
	{
		$this->produto = $produto;
	}

	/**
	 * Add resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return view
	 */
	public function addProduct()
	{
		$categorias = Categoria::all();
		$marcas = Marca::all();

		return view('create', [
			'categorias' => $categorias,
			'marcas' => $marcas
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return function
	 */
	public function create(Request $request)
	{
		$request->validate($this->produto->rules(), $this->produto->feedback());
		$parseProduct = $request->all();

		$idsCategorias = $parseProduct['categoria_ids'];
		unset($parseProduct['categoria_ids']);

		$produto = $this->produto->create($parseProduct);
		$produto->categorias()->attach($idsCategorias);

		return redirect()->route('index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		$produtos = $this->produto->with('marca')->with('categorias')->paginate(15);
		return view('index', ['produtos' => $produtos]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Integer
	 * @return View
	 */
	public function edit(Request $request, $id)
	{
		$produto = $this->produto->find($id);
		$categorias = $produto->load(['categorias'])['categorias'];

		$idsCategorias = [];
		foreach ($categorias as $categoria) {
			$idsCategorias[] = $categoria->id;
		}
		$produto->categoria_ids = $idsCategorias;

		if (is_null($produto)) {
			return response('error', 404);
		}
		$categorias = Categoria::all();
		$marcas = Marca::all();

		return view('create', [
			'produto' => $produto,
			'categorias' => $categorias,
			'marcas' => $marcas
		]);
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
		$request->validate($this->produto->rules(), $this->produto->feedback());

		$parseProduct = $request->all();
		$idsCategorias = $parseProduct['categoria_ids'];
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
			return Response('error', 404);
		}

		return $produto;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  Integer
	 * @return function
	 */
	public function update(Request $request, $id)
	{
		$dataUpdate = $request->all();
		$produto = $this->produto->find($id);

		$produto->categorias()->sync($dataUpdate['categoria_ids']);

		if (is_null($produto)) {
			return response('error', 404);
		}
		unset($dataUpdate['categoria_ids']);
		$produto->update($dataUpdate);

		return redirect()->route('index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Integer
	 * @return function
	 */
	public function destroy($id)
	{
		$produto = $this->produto->find($id);

		if (is_null($produto)) {
			return response('error', 404);
		}
		$produto->delete();

		return response('success', 200);
	}
}
