<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    protected $table = 'observacoes';
    protected $primaryKey = 'idObservacao';
    protected $fillable = ['idProduto', 'idUsuario', 'observacao'];

}
