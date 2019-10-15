@extends( 'layouts.modal', [ 'id' => 'modal-listar-alteracoes', 'size' => 'lg' ] )

@php
$colunas = [
    [ 'key' => 'dataAlteracao', 'label' => 'Data de Alteração' ],
    [ 'key' => 'descricao', 'label' => 'Descrição' ],
    [ 'key' => 'usuario', 'label' => 'Usuário Responsável' ],
];

$linhas = array();
array_push( $linhas, (object) [
    'dataAlteracao' => '25/09/2019 12:20',
    'descricao' => 'uma descricao de alteracao bem legal',
    'usuario' => 'Alexandreeee'
] );
@endphp

@section( 'modal-title' )
Histórico de Alterações
@overwrite

@section( 'modal-body' )
@table([ 'colunas' => $colunas, 'linhas' => $linhas ])
@endtable
@overwrite