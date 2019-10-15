@extends( 'layouts.modal', [ 'id' => 'modal-adicionar-descricao' ] )

@section( 'modal-title' )
Adicionar descrição
@overwrite

@section( 'modal-body' )
<div>
    <p>Adicione uma breve descrição das alterações realizadas.</p>
</div>
<div class="form-row">
    @textarea([ 'name' => 'observacao' ])
    @endtextarea
</div>
@overwrite

@section( 'modal-footer' )
<button type="button" class="btn btn-primary">Adicionar</button>
@overwrite