<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
  protected $table = 'modelo';
  protected $primaryKey = 'idModelo';
  protected $fillable = [];
  public $timestamps = false;
}
