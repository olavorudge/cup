<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'idProduto';
    protected $fillable = ['idProduto', 'idAreaConhecimento', 'idAnoEscolar', 'idOrigem', 'titulo', 'tituloObra','anoUso','anoLancamento',  'anoCicloVida', 'volume', 'numEdicao', 'pegLA', 'pegLP', 'ISBN_LA', 'ISBN_LP', 'nomeContrato','nomeCapa','pseudonomio','numContrato','dataAssinatura','validadeContrato','arquivado','bolAnulado'];

}
