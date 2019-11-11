<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogProduto extends Model
{
  protected $table = 'logs_produto';
  protected $primaryKey = 'idLog';
  protected $fillable = ['idTipoLog', 'idProduto', 'idEspecificacao', 'idUsuario', 'descricaoLog', 'descricaoJson' ,'observacao', 'created_at'];
  public $timestamps = false;


}
