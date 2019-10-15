<div class="d-flex" style="flex-flow: column">
    <form class="mr-3" style="flex: 1" action="">
        <div class="form-row">
            @select([ 'options' => [ 'Capa', 'Miolo' ] ])
            Componente
            @endselect
        </div>
        <div class="form-row">
            @input([ 'value' => '' ])
            Formato aberto (mm)
            @endinput

            @input([ 'value' => '' ])
            Formato fechado (mm)
            @endinput

            @input([ 'value' => '' ])
            Número de páginas
            @endinput
        </div>
        <div class="form-row">
            @input([ 'value' => '' ])
            Papel/Gramatura
            @endinput

            @input([ 'value' => '' ])
            Cores
            @endinput

            @input([ 'value' => '' ])
            Acabamento
            @endinput
        </div>
        <div class="form-row">
            @input([ 'value' => '' ])
            Observação
            @endinput
        </div>
        <div class="form-row">
            @input([ 'value' => '' ])
            Espessura (mm)
            @endinput

            @input([ 'value' => '' ])
            Peso (g)
            @endinput

            @select([ 'options' => [ 'Retrato', 'Paisagem' ] ])
            Orientação
            @endselect

            @input([ 'value' => '' ])
            Alvura (%)
            @endinput
        </div>
        <div class="form-row">
            @input([ 'value' => '' ])
            Opacidade
            @endinput

            @select([ 'options' => [ 'A', 'B' ] ])
            Lombada
            @endselect

            @input([ 'value' => '' ])
            Medidas da lombada (mm)
            @endinput
        </div>
        <div class="form-row">
            @filepicker([ 'type' => '*' ])
            Adicionar planilha
            @endfilepicker

            <div class="col">
                <img src="{{ Storage::url( 'planilha1.jpg' ) }}" />
            </div>
        </div>


        {{-- <div class="text-right">
                    <button class="btn btn-primary btn-salvar-componente">Adicionar</button>
                    <button class="btn btn-secondary btn-cancelar btn-cancelar-componente">Cancelar</button>
                </div> --}}
    </form>
    <div style="">
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