@php
$render = function( $produto ) {

    $html = '<a href="#"><span data-toggle="tooltip" class="material-icons">delete</span></a>';
    return $html;
};

$colunas = [
    [ 'key' => 'nome', 'label' => 'Nome' ],
    [ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ]
];
@endphp

<div class="mb-3">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar-produto">Adicionar produto</button>
</div>

@table([ 'colunas' => $colunas, 'linhas' => $produto->produtosFilhos ])
@endtable

{{-- <div class="text-right">
    <button class="btn btn-primary">Salvar</button>
    <button class="btn btn-secondary">Cancelar</button>
</div> --}}