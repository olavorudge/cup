@extends( 'layouts.app' )

@section('title', $produto->id == 0 ? 'Cadastrar Produto' : 'Editar Produto')

@section('content')

<div class="tab">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Cadastro geral e autoria</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false">Autoria</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false">Estrutura</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="especificacoes-tab" data-toggle="tab" href="#especificacoes" role="tab"
                aria-controls="especificacoes" aria-selected="false">Especificações técnicas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="observacoes-tab" data-toggle="tab" href="#observacoes" role="tab"
                aria-controls="observacoes" aria-selected="false">Observações</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            @include('partials.cadastrar-produto-geral')
        </div>
        {{-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @include('partials.cadastrar-produto-autoria')
        </div> --}}
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            @include( 'partials.cadastrar-produto-estrutura' )
        </div>
        <div class="tab-pane fade nav-inner" id="especificacoes" role="tabpanel" aria-labelledby="especificacoes-tab">
            @include( 'partials.cadastrar-produto-especificacoes' )
        </div>
        <div class="tab-pane fade" id="observacoes" role="tabpanel" aria-labelledby="observacoes-tab">
            @include( 'partials.cadastrar-produto-observacoes' )
        </div>
    </div>
    <div style="background-color: #ddd; padding: 10px;">
        Criado em: 01/10/2019. Atualizado em: 02/10/2019. Atualizado por: Alexandre Grocholski.
    </div>
</div>

@endsection

@include( 'modals.buscar-produto', [ 'size' => 'xl' ] )

@include( 'modals.adicionar-descricao' )

@include( 'modals.adicionar-componente', [ 'size' => 'xl' ] )

@include( 'modals.adicionar-observacao' )