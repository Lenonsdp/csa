<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduto extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function (Blueprint $table) {
			$table->id();
			$table->string('nome', 150);
			$table->unsignedBigInteger('marca_id');
			$table->longText('especificacao_tecnica')->nullable();
			$table->boolean('status')->default(true);;
			$table->timestamps();

			$table->foreign('marca_id')->references('id')->on('marcas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('produto');
	}
}
