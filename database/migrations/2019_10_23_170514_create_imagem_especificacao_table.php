<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagemEspecificacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagem_especificacao', function(Blueprint $table)
		{
			$table->integer('idImagemEspecificacao')->primary();
			$table->integer('idArquivo');
			$table->integer('idEspecificacao');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imagem_especificacao');
	}

}
