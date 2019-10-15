<?php

namespace App\Models\ViewModels;

class UsuarioViewModel
{
    function __construct()
    {
        $this->permissoes = array();
    }

    public $id;

    public $nome;

    public $email;

    public $permissoes;
}
