@php
$render = function( $produto ) {

    $html = '<a href=""><span data-toggle="tooltip" class="material-icons">edit</span></a>';
    return $html;
};

$colunas = [
    [ 'key' => 'componente', 'label' => 'Componente' ],
    [ 'key' => 'numeroPaginas', 'label' => 'Número de páginas' ],
    [ 'key' => 'acoes', 'label' => 'Ações', 'render' => $render ]
];
@endphp

<ul class="nav nav-pills nav-fill" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="livro-aluno-tab" data-toggle="tab" href="#livro-aluno" role="tab"
            aria-controls="livro-aluno" aria-selected="true">Livro do aluno</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="livro-professor-tab" data-toggle="tab" href="#livro-professor" role="tab"
            aria-controls="livro-professor" aria-selected="false">Livro do professor</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="suplementos-tab" data-toggle="tab" href="#suplementos" role="tab"
            aria-controls="suplementos" aria-selected="false">Suplementos</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="livro-aluno" role="tabpanel" aria-labelledby="livro-aluno-tab">
        <div class="table-componentes">
            <div class="mb-3">
                <button class="btn btn-primary btn-adicionar-componente">Adicionar componente</button>
            </div>

            @table([ 'colunas' => $colunas, 'linhas' => $produto->componentes ])
            @endtable

            {{-- <div class="text-right">
                <button class="btn btn-primary">Salvar</button>
                <button class="btn btn-secondary">Cancelar</button>
            </div> --}}
        </div>
        {{-- <div class="form-cadastrar-componente" style="display: none">
            @include( 'partials.cadastrar-componente' )
        </div> --}}
    </div>
    <div class="tab-pane fade" id="livro-professor" role="tabpanel" aria-labelledby="livro-professor-tab">
        ..2
    </div>
    <div class="tab-pane fade" id="suplementos" role="tabpanel" aria-labelledby="suplementos-tab">
        ...3
    </div>
</div>