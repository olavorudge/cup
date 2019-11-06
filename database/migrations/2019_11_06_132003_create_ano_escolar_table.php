<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnoEscolarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ano_escolar', function(Blueprint $table)
		{
			$table->integer('idAnoEscolar', true);
			$table->integer('idNivel');
			$table->string('nomeAnoEscolar', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ano_escolar');
	}

}
