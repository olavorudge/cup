<?php

namespace App\Models\ViewModels;

class LinhaProdutoViewModel
{
    function __construct()
    {
        $this->subLinhas = array();
    }

    public $id;

    public $nome;

    public $subLinhas;
}
