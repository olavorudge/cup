<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'idProduto';
    protected $fillable = ['idProduto', 'idAreaConhecimento', 'idAnoEscolar', 'idOrigem', 'titulo', 'tituloObra','anoUso','anoLancamento',  'anoCicloVida', 'volume', 'numEdicao', 'idioma','peg_la', 'peg_lp', 'isbn_la', 'isbn_lp', 'nomeContrato','nomeCapa','pseudonimo','numContrato','dataAssinatura','validadeContrato','arquivado','bolAnulado'];
  protected $hidden = ['logsProduto'];

    public function logsProduto()
    {
        return $this->hasMany('App\LogProduto', 'idProduto');
    }
}
