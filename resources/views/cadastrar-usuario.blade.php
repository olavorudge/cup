@extends( 'layouts.app' )

@section( 'title', $usuario->id == 0 ? 'Cadastrar usuário' : 'Editar usuário' )

@section( 'content' )
<form action="">
    <div class="form-row">
        @input([ 'value' => $usuario->nome ])
        Nome
        @endinput

        @input([ 'value' => $usuario->email ])
        E-mail
        @endinput
    </div>

    <p>Permissões</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
        <label class="form-check-label" for="inlineCheckbox1">Consulta</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
        <label class="form-check-label" for="inlineCheckbox2">Cadastro</label>
    </div>

    <div class="mt-3 text-right">
        <button class="btn btn-primary btn-salvar-produto">Salvar</button>
        <a href="{{ route( 'usuarios' ) }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection