<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspecificacaoTecnica extends Model
{
    protected $table = 'especificacoes_tecnicas';
    protected $primaryKey = 'idEspecificacao';
    protected $fillable = ['idProduto', 'idTipoEspecificacao', 'componente', 'formatoAberto', 'formatoFechado', 'numPagina', 'papel', 'cores', 'acabamento', 'observacoes', 'espessura', 'peso', 'orientacao', 'alvura', 'opacidade', 'lombada', 'medLombada', 'bolAnulado'];

}
