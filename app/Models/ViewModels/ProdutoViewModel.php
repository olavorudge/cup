<?php

namespace App\Models\ViewModels;

class ProdutoViewModel
{
    function __construct()
    {
        $this->produtosFilhos = array();
        $this->componentes = array();
        $this->observacoes = array();
        $this->numeroPendencias = 0;
    }

    public $id;

    public $identificador;

    public $nome;

    public $tituloColecao;

    public $peg;

    public $isbn;

    public $produtosFilhos;

    public $componentes;

    public $numeroPendencias;

    public $observacoes;

    public $dataModificacao;

    public $tipo;
}
