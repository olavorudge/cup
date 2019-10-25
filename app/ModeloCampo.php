<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModeloCampo extends Model
{
  protected $table = 'modelo_campo';
  protected $fillable = ['idModelo', 'idCampo'];
}
