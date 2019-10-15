@extends( 'layouts.modal', [ 'id' => 'modal-buscar-produto', 'slide' => true ] )

@php
$render = function( $produto ) {

$html = '<input type="checkbox" value="' . $produto->id . '" />';
return $html;
};

$colunas = [
[ 'key' => 'acoes', 'label' => 'Selecionar', 'render' => $render ],
[ 'key' => 'identificador', 'label' => 'Identificador' ],
[ 'key' => 'nome', 'label' => 'Nome' ]
];

$produtos = [
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'ASDFASDFAS', 'nome' => 'Produto B' ],
    (object)[ 'id' => 1, 'identificador' => 'DFASFASEEF', 'nome' => 'Produto C' ],
    (object)[ 'id' => 1, 'identificador' => 'ASDFASFASF', 'nome' => 'Produto D' ],
    (object)[ 'id' => 1, 'identificador' => 'JYDJDYJDTY', 'nome' => 'Produto E' ],
    (object)[ 'id' => 1, 'identificador' => 'DGAERGERG', 'nome' => 'Produto F' ],
    (object)[ 'id' => 1, 'identificador' => 'DRGAERGADGA', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'ADFGADRGADRG', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
    (object)[ 'id' => 1, 'identificador' => 'PDJFOIASF465', 'nome' => 'Produto A' ],
]
@endphp

@section( 'modal-title' )
Buscar produtos
@overwrite

@section( 'modal-body' )
<div class="mb-3">
    {{-- <div class="input-group">
        <input type="text" class="form-control" placeholder="">
        <div class="input-group-append">
            <button class="btn btn-short btn-secondary" type="button">Buscar</button>
        </div>
    </div> --}}

    <div class="form-row">
        @input([ 'name' => 'identificador' ])
        Identificador
        @endinput

        @input([ 'name' => 'peg' ])
        Número PEG
        @endinput

        @select([ 'options' => [ [ '1° Ano', 1 ], [ '2° Ano', 2 ] ] ])
        Ano escolar / Série
        @endselect

        @select([ 'options' => [ 1, 2, 3, 4 ] ])
        Volume
        @endselect

        <div class="form-group col col-1 d-flex align-items-end justify-content-end">
            <button class="btn btn-short btn-secondary" type="button">Buscar</button>
        </div>
    </div>
</div>

@table([ 'colunas' => $colunas, 'linhas' => $produtos ])
@endtable
@overwrite

@section( 'modal-footer' )
<button type="button" class="btn btn-primary">Adicionar</button>
@parent
@overwrite