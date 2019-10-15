@extends( 'layouts.app' )

@php
$render = function() {
$html = '<a href="" title="Deletar" data-toggle="tooltip"><span class="material-icons">delete</span></a>';
return $html;
};

$colunas = [
[ 'key' => 'nome', 'label' => 'Nome' ],
[ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ]
];

$modelos1 = [
    (object)[ 'nome' => 'Modelo geral 1' ],
    (object)[ 'nome' => 'Modelo geral 2' ]
];

$modelos2 = [
    (object)[ 'nome' => 'Modelo personalizado 1' ],
    (object)[ 'nome' => 'Modelo personalizado 2' ]
];

@endphp

@section( 'title', 'Modelos de relatórios' )

@section( 'content' )
<div class="mb-3">
    <a href="{{ route( 'cadastrar-modelo' ) }}" class="btn btn-primary btn-adicionar-modelo">Adicionar</a>
</div>

<p>Modelos personalizados</p>
@table([ 'colunas' => $colunas, 'linhas' => $modelos2 ])
@endtable


<p>Modelos gerais</p>
@table([ 'colunas' => $colunas, 'linhas' => $modelos1 ])
@endtable
@endsection