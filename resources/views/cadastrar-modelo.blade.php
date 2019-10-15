@extends( 'layouts.app' )

@section( 'title', 'Cadastrar modelo' )

@section( 'content' )

<form>
    <div class="form-row">
        @input
        Nome do modelo
        @endinput
    </div>

    <div class="form-row">
        @select([ 'options' => [ [ 'Para todos', 1 ], [ 'Somente eu', 2 ] ] ])
        Compartilhamento
        @endselect
    </div>

    <p>
        Selecionar campos
    </p>

    <div class="form-row">
        @checkbox([ 'id' => '1' ])
        Título da coleção
        @endcheckbox

        @checkbox([ 'id' => '2' ])
        Título da obra
        @endcheckbox

        @checkbox([ 'id' => '3' ])
        Geração de uso (Ano)
        @endcheckbox

        @checkbox([ 'id' => '4' ])
        Ano de lançamento
        @endcheckbox

        @checkbox([ 'id' => '5' ])
        Ciclo de vida (até)
        @endcheckbox
    </div>
    <div class="form-row">
        @checkbox([ 'id' => '6' ])
        Área de conhecimento
        @endcheckbox

        @checkbox([ 'id' => '7' ])
        Nível de ensino
        @endcheckbox

        @checkbox([ 'id' => '8' ])
        Ano escolar/Série
        @endcheckbox

        @checkbox([ 'id' => '9' ])
        Volume
        @endcheckbox

        @checkbox([ 'id' => '10' ])
        Número da edição
        @endcheckbox
    </div>
    <div class="form-row">
        @checkbox([ 'id' => '11' ])
        Origem
        @endcheckbox

        @checkbox([ 'id' => '12' ])
        Idioma
        @endcheckbox

        @checkbox([ 'id' => '13' ])
        PEG (LA)
        @endcheckbox

        @checkbox([ 'id' => '14' ])
        PEG (LP)
        @endcheckbox

        @checkbox([ 'id' => '15' ])
        ISBN (LA)
        @endcheckbox
    </div>
    <div class="form-row">
        @checkbox([ 'id' => '16' ])
        ISBN (LP)
        @endcheckbox

        @checkbox([ 'id' => '17' ])
        Nome para contrato
        @endcheckbox

        @checkbox([ 'id' => '18' ])
        Nome para capa
        @endcheckbox

        @checkbox([ 'id' => '19' ])
        Pseudônimo
        @endcheckbox
    </div>
    <div class="form-row">
        @checkbox([ 'id' => '20' ])
        Número do contrato
        @endcheckbox

        @checkbox([ 'id' => '21' ])
        Data de assinatura
        @endcheckbox

        @checkbox([ 'id' => '22' ])
        Validade do contrato
        @endcheckbox
    </div>

    <div class="mt-3 text-right">
        <button class="btn btn-primary btn-salvar-produto">Salvar</button>
        <a href="{{ route( 'modelos' ) }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection