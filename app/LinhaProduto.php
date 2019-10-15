<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinhaProduto extends Model
{
    protected $primaryKey = 'idLinhaProduto';

    public $fillable = ['nome'];
}
