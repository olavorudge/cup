@extends( 'layouts.app' )

@php
$render = function( $produto ) {
$html = '<a href="' . route('editar', [ 'id' => $produto->id ]) . '" title="Editar" data-toggle="tooltip"><span
        class="material-icons">edit</span></a>';
$html .= '<a href="#" class="btn-mostrar-pendencias" title="Mostrar pendências" data-toggle="tooltip"><span
        class="material-icons">error_outline</span></a>';
return $html;
};

$colunas = [
[ 'key' => 'identificador', 'label' => 'Identificador' ],
[ 'key' => 'peg', 'label' => 'PEG' ],
[ 'key' => 'nome', 'label' => 'Nome' ],
[ 'key' => 'isbn', 'label' => 'ISBN' ],
[ 'key' => 'dataModificacao', 'label' => 'Modificação' ],
[ 'key' => 'numeroPendencias', 'label' => 'Número de pendências' ],
[ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ]
];
@endphp

@section( 'title', $title )

@section( 'content' )
<div class="mb-3 d-flex flex-row justify-content-end">
    <button class="btn btn-primary btn-opcoes-filtrar-produtos">Opções de filtro</button>
</div>

<div class="form-filtrar-produtos card mb-3" style="display: none">
    <div class="card-body">
        <div class="form-row">
            @input([ 'name' => 'identificador' ])
            Identificador
            @endinput

            @input([ 'name' => 'peg' ])
            Número PEG
            @endinput

            @select([ 'options' => [ [ '1° Ano', 1 ], [ '2° Ano', 2 ] ], 'size' => 2 ])
            Ano escolar / Série
            @endselect

            @select([ 'options' => [ 1, 2, 3, 4 ], 'size' => 2 ])
            Volume
            @endselect
        </div>

        <div class="text-right">
            <button class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</div>

@table([ 'colunas' => $colunas, 'linhas' => $produtos ])
@endtable
@endsection
