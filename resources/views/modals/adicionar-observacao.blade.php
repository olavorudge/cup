@extends( 'layouts.modal', [ 'id' => 'modal-adicionar-observacao' ] )

@section( 'modal-title' )
Adicionar observação
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