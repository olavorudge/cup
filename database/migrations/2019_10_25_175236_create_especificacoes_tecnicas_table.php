<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEspecificacoesTecnicasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('especificacoes_tecnicas', function(Blueprint $table)
		{
			$table->integer('idEspecificacao', true);
			$table->integer('idProduto');
			$table->integer('idTipoEspecificacao');
			$table->string('componente', 50)->nullable()->default('0');
			$table->string('formatoAberto', 100)->nullable()->default('0');
			$table->string('formatoFechado', 100)->nullable()->default('0');
			$table->integer('numPagina')->nullable()->default(0);
			$table->string('papel', 100)->nullable()->default('0');
			$table->string('cores', 150)->nullable()->default('0');
			$table->string('acabamento', 150)->nullable()->default('0');
			$table->string('observacoes', 300)->nullable()->default('0');
			$table->string('espessura', 50)->nullable()->default('0');
			$table->float('peso', 10, 0)->nullable()->default(0);
			$table->string('orientacao', 50)->nullable();
			$table->string('alvura', 50)->nullable();
			$table->string('opacidade', 50)->nullable();
			$table->string('lombada', 5)->nullable();
			$table->string('medLombada', 50)->nullable();
			$table->integer('bolAnulado')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('especificacoes_tecnicas');
	}

}
