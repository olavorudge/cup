<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogProduto extends Model
{
  protected $table = 'logs_produto';
  protected $primaryKey = 'idLog';
  protected $fillable = ['idTipoLog', 'idProduto', 'idEspecificacao', 'idUsuario', 'descricaoLog', 'descricaoJson' ,'observacao', 'created_at'];
  protected $dates = ['created_at'];


  public function produto()
  {
      return $this->belongsTo('App\Produto', 'idProduto');
  }
}
