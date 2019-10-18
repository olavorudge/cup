@extends( 'layouts.app' )

@php
$render = function( $produto )
{
    $html = '<a href="' . route('editar', [ 'id' => $produto->id ]) . '" title="Editar" data-toggle="tooltip"><span
            class="material-icons">edit</span></a>';
    $html .= '<a href="" title="Deletar" data-toggle="tooltip"><span class="material-icons">delete</span></a>';
    $html .= '<a href="" title="Exportar" data-toggle="tooltip"><span class="material-icons">picture_as_pdf</span></a>';
    $html .= '<a href="#" title="Histórico" data-toggle="modal" data-target="#modal-listar-alteracoes"><span class="material-icons">history</span></a>';
    return $html;
};

$selecionar = function ( $produto )
{
    return '<div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck-' . $produto->id . '">
                <label class="custom-control-label" for="customCheck-' . $produto->id . '"></label>
            </div>';
};

$colunas = [];
array_push( $colunas, [ 'key' => 'selecionar', 'label' => 'Selecionar', 'render' => $selecionar ] );

if ( Route::current()->getName() == 'produtos-todos' )
{
    array_push( $colunas, [ 'key' => 'tipo', 'label' => 'Tipo' ] );
}

array_push( $colunas,
//[ 'key' => 'selecionar', 'label' => 'Selecionar', 'render' => $selecionar ],
[ 'key' => 'identificador', 'label' => 'Identificador' ],
[ 'key' => 'peg', 'label' => 'PEG' ],
[ 'key' => 'nome', 'label' => 'Nome' ],
[ 'key' => 'isbn', 'label' => 'ISBN' ],
[ 'key' => 'dataModificacao', 'label' => 'Modificação' ],
[ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ] );

@endphp

@section( 'title', $title )

@section( 'content' )

<div class="mb-3 flex-row justify-content-end text-right">
    <a href="{{ route( 'cadastrar' ) }}" class="btn btn-primary btn-adicionar-produto align-self-start" style="float: left">Adicionar</a>
    <button class="btn btn-primary btn-opcoes-filtrar-produtos">Opções de filtro</button>
    <button class="btn btn-secondary btn-opcoes-exportar-produtos">Opções de exportação</button>
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

<div class="form-exportar-produtos card mb-3" style="display: none">
    <div class="card-body">
        <p>Selecione um modelo de relatório para exportar os dados.</p>
        <div class="form-row">
            @select([ 'options' => [ 'Modelo geral 1', 'Modelo geral 2', 'Modelo personalizado 1' ], 'size' => 3 ])
            @endselect
        </div>
        <div class="text-right">
            <button class="btn btn-primary">Exportar</button>
        </div>
    </div>
</div>

@table([ 'colunas' => $colunas, 'linhas' => $produtos ])
@endtable

@endsection

@include( 'modals.listar-alteracoes' )
