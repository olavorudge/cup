@extends( 'layouts.modal', [ 'id' => 'modal-adicionar-componente', 'slide' => true ] )

@section( 'modal-title' )
Adicionar componente
@overwrite

@section( 'modal-body' )

@include( 'partials.cadastrar-componente' )

@overwrite

@section( 'modal-footer' )
<button type="button" data-dismiss="modal" class="btn btn-primary">Adicionar</button>
@parent
@overwrite