@php
$colunas = [
    [ 'key' => 'data', 'label' => 'Data de Criação' ],
    [ 'key' => 'observacao', 'label' => 'Observação' ]
];
@endphp

{{-- <div class="form-row">
    @textarea([ 'name' => 'observacao' ])
    @endtextarea
</div> --}}

<div class="mb-3">
    <button class="btn btn-primary btn-adicionar-observacao">Adicionar observação</button>
</div>

@table([ 'id' => 'table-observacoes', 'colunas' => $colunas, 'linhas' => $produto->observacoes ])
@endtable

{{-- <div class="text-right">
    <button class="btn btn-primary">Salvar</button>
    <button class="btn btn-secondary">Cancelar</button>
</div> --}}