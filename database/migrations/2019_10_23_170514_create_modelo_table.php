<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModeloTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modelo', function(Blueprint $table)
		{
			$table->integer('idModelo', true);
			$table->integer('idUsuario')->nullable();
			$table->string('nomeModelo', 150);
			$table->string('autor', 150);
			$table->integer('compartilhamento')->default(0);
			$table->integer('bolAnulado')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('modelo');
	}

}
