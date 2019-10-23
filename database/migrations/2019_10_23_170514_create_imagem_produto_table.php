<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagemProdutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagem_produto', function(Blueprint $table)
		{
			$table->integer('idImagemProduto')->primary();
			$table->integer('idProduto');
			$table->integer('idArquivo');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imagem_produto');
	}

}
