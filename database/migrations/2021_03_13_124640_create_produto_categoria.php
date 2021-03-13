<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoCategoria extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produto_categorias', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('produto_id');
			$table->unsignedBigInteger('categoria_id');
			$table->timestamps();

			$table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
			$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('produto_categorias');
	}
}
