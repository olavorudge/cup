@extends( 'layouts.app' )

@php
$render = function( $usuario ) {

$html = '<a href="' . route( 'editar-usuario', [ 'id' => $usuario->id ] ) . '" title="Editar"
    data-toggle="tooltip"><span class="material-icons">edit</span></a>';
return $html;
};

$colunas = [
[ 'key' => 'nome', 'label' => 'Nome' ],
[ 'key' => 'email', 'label' => 'E-mail' ],
[ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ]
];
@endphp

@section( 'title', 'Usuários' )

@section( 'content' )

{{-- <div class="mb-3 text-right">
    <button class="btn btn-primary btn-opcoes-filtrar-produtos">Opções de filtro</button>
    <button class="btn btn-secondary btn-opcoes-exportar-produtos">Opções de exportação</button>
</div> --}}

@table([ 'colunas' => $colunas, 'linhas' => $usuarios ])
@endtable

@endsection