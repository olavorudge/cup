<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  protected $table = 'logs';
  protected $primaryKey = 'idLog';
  protected $fillable = ['idTipoLog', 'idUsuario', 'descricaoLog', 'observacao', 'created_at'];
  public $timestamps = false;

}
