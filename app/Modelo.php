<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  protected $table = 'modelo';
  protected $primaryKey = 'idModelo';
  protected $fillable = ['idUsuario', 'nomeModelo', 'autor', 'compartilhamento', 'bolAnulado'];
  public $timestamps = false;
}
