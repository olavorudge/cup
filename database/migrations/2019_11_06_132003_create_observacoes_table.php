<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacoesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('observacoes', function(Blueprint $table)
		{
			$table->integer('idObservacao', true);
			$table->integer('idProduto');
			$table->integer('idUsuario')->default(0);
			$table->string('observacao', 350);
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
		Schema::drop('observacoes');
	}

}
