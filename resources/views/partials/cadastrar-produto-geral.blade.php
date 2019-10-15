<div class="d-flex" style="flex-flow: column">
    <h6>
        <b>Dados gerais</b>
    </h6>
    <form class="mr-3" style="flex: 1" method="POST">
        {{ csrf_field() }}

        <div class="form-row">
            @input([ 'name' => 'tituloColecao', 'value' => $produto->tituloColecao ])
            Título da coleção
            @endinput

            @input([ 'value' => 'foo baz' ])
            Título da obra
            @endinput
        </div>

        <div class="form-row">
            @select([ 'options' => [ 2019, 2018, 2017 ]])
            Geração de uso (Ano)
            @endselect

            @select([ 'options' => [ 2019, 2018, 2017 ]])
            Ano de lançamento
            @endselect

            @select([ 'options' => [ 2021, 2020, 2019 ]])
            Ciclo de vida (até)
            @endselect
        </div>

        <div class="form-row">
            @select([ 'options' => [ [ 'Ciências', 1 ], [ 'Português', 2 ] ] ])
            Área de conhecimento
            @endselect

            @select([ 'options' => [ [ 'Fundamental 1', 1 ], [ 'Fundamental 2', 2 ], [ 'Médio', 3 ] ] ])
            Nível de ensino
            @endselect

            @select([ 'options' => [ [ '1° Ano', 1 ], [ '2° Ano', 2 ] ] ])
            Ano escolar / Série
            @endselect
        </div>

        <div class="form-row">
            @select([ 'options' => [ 1, 2, 3, 4 ] ])
            Volume
            @endselect

            @input([ 'value' => 1 ])
            Número da edição
            @endinput

            @select([ 'options' => [ [ 'Brasil', 1 ], [ 'Japão', 2 ] ] ])
            Origem (país)
            @endselect

            @select([ 'options' => [ [ 'Português brasileiro', 1 ], [ 'Japonês', 2 ] ] ])
            Idioma
            @endselect
        </div>

        {{-- <div class="form-row">
            @filepicker([ 'type' => 'image/png, image/jpeg', 'size' => '3' ])
            Adicionar imagem
            @endfilepicker

            <div class="col">
                <img width="100px" src="{{ Storage::url('Tulips.jpg') }}" />
</div>
</div> --}}

<div class="form-row">
    @input([ 'value' => '' ])
    PEG (LA)
    @endinput

    @input([ 'value' => '' ])
    PEG (LP)
    @endinput

    @input([ 'value' => '' ])
    ISBN (LA)
    @endinput

    @input([ 'value' => '' ])
    ISBN (LP)
    @endinput
</div>
<h6>
    <b>Autoria</b>
</h6>
<div class="form-row">
    @input([ 'value' => '' ])
    Nome para contrato
    @endinput
</div>

<div class="form-row">
    @input([ 'value' => '' ])
    Nome para capa
    @endinput

    @input([ 'value' => '' ])
    Pseudônimo
    @endinput
</div>

<div class="form-row">
    @input([ 'value' => '', 'size' => 2 ])
    Número do contrato
    @endinput

    @datepicker([ 'size' => 2 ])
    Data da assinatura
    @enddatepicker

    @datepicker([ 'size' => 2 ])
    Validade do contrato
    @enddatepicker
</div>
</form>
<div>
    <label>
        Imagens
    </label>
    <div class="form-row">
        @filepicker([ 'type' => 'image/png, image/jpeg' ])
        Adicionar imagem
        @endfilepicker
    </div>

    <div class="row">
        <div class="col-4">
            <img width="100%" src="{{ Storage::url( 'Tulips.jpg' ) }}" />
        </div>
        <div class="col-4">
            <img width="100%" src="{{ Storage::url( 'Chrysanthemum.jpg' ) }}" />
        </div>
        <div class="col-4">
            <img width="100%" src="{{ Storage::url( 'Tulips.jpg' ) }}" />
        </div>
    </div>
</div>
</div>
<div class="mt-3 text-right">
    <button class="btn btn-primary btn-salvar-produto">Salvar</button>
    <button class="btn btn-secondary">Cancelar</button>
</div>