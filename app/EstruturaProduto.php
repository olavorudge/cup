<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstruturaProduto extends Model
{
    protected $table = 'estrutura_produto';
    protected $fillable = ['idEstrutura','idProduto'];
    public $timestamps = false;
}
