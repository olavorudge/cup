<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArquivoEspecificacaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivo_especificacao', function(Blueprint $table)
		{
			$table->integer('idArquivoEspecificacao')->primary();
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
		Schema::drop('arquivo_especificacao');
	}

}
