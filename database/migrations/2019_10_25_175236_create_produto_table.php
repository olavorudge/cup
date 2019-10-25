<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produto', function(Blueprint $table)
		{
			$table->integer('idProduto', true);
			$table->integer('idAreaConhecimento');
			$table->integer('idAnoEscolar');
			$table->integer('idOrigem');
			$table->string('titulo', 350);
			$table->string('tituloObra', 350)->nullable();
			$table->integer('anoUso')->nullable()->default(0);
			$table->integer('anoLancamento')->nullable()->default(0);
			$table->integer('anoCicloVida')->nullable()->default(0);
			$table->integer('volume')->nullable()->default(0);
			$table->string('numEdicao', 150)->nullable();
			$table->string('pegLA', 150)->nullable();
			$table->string('pegLP', 150)->nullable();
			$table->string('ISBN_LA', 150)->nullable();
			$table->string('ISBN_LP', 150)->nullable();
			$table->string('nomeContrato', 150)->nullable();
			$table->string('nomeCapa', 150)->nullable();
			$table->string('pseudonomio', 150)->nullable();
			$table->integer('numContrato')->nullable()->default(0);
			$table->date('dataAssinatura')->nullable();
			$table->date('validadeContrato')->nullable();
			$table->boolean('arquivado');
			$table->boolean('bolAnulado')->nullable();
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
		Schema::drop('produto');
	}

}
