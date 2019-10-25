<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAreaConhecimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('area_conhecimento', function(Blueprint $table)
		{
			$table->integer('idAreaConhecimento', true);
			$table->string('nomeAreaConhecimento', 100);
			$table->string('strSigla', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('area_conhecimento');
	}

}
