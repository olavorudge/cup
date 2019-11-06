<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogsProdutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs_produto', function(Blueprint $table)
		{
			$table->integer('idLogProduto', true);
			$table->integer('idUsuario')->default(0);
			$table->integer('idProduto')->default(0);
			$table->integer('idTipoLog')->default(0);
			$table->integer('idEspecificacao')->nullable()->default(0);
			$table->text('descricaoLog', 65535)->nullable();
			$table->text('observacao', 65535)->nullable();
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logs_produto');
	}

}
