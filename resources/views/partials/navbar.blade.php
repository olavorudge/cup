@php
$id = request()->get( 'linha' );
$subLinhas = request()->get( 'subLinhas' );

$isActive = function($menuRoute)
{
return Route::current()->getName() == $menuRoute ? "active" : "";
}
@endphp

<nav id="sidebar" class="sidebar">
    <div class="sidebar-content ">
        <a class="sidebar-brand" href="/">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-box align-middle">
                <path
                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                </path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg> --}}
            <span class="align-middle">Cadastro Único de Produtos</span>
        </a>

        <ul class="sidebar-nav">
            {{-- @if (Route::current()->getName() == 'home') --}}
            {{-- <li class="sidebar-header">
                Administração
            </li> --}}

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-calendar align-middle">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="align-middle">Relatórios</span>
                    <span class="sidebar-badge badge badge-primary">New</span>
                </a>
            </li> --}}
            {{-- @else --}}
            {{-- <li class="sidebar-header">
                Administração
            </li> --}}
            @if ( $id )
            <li class="sidebar-header">
                Produtos
            </li>
            <li class="sidebar-item">
                <a href="#planejamento" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    {{-- <i class="fas fa-chart-line"></i> --}}
                    <span class="align-middle">Consultar</span>
                </a>
                <ul id="planejamento" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route( 'produtos-todos' ) }}">Todos</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route( 'produtos' ) }}">Produtos</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route( 'estruturas' ) }}">Estruturas</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#pendencias" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    {{-- <i class="fas fa-chart-line"></i> --}}
                    <span class="align-middle">Pendências</span>
                </a>
                <ul id="pendencias" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route( 'pendencias' ) }}">Todas</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route( 'pendencias-geral' ) }}">Cadastro
                            geral</a></li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route( 'pendencias-especificacoes' ) }}">Especificações técnicas</a></li>
                </ul>
            </li>
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route( 'pendencias' ) }}">
            <span class="align-middle">Pendências</span>
            </a>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('cadastrar') }}">
            <span class="align-middle">Cadastrar Produto</span>
            </a>
            </li> --}}

            @if ( $subLinhas )
            <li class="sidebar-header">
                Selecionar outra linha
            </li>
            @foreach ($subLinhas as $subLinha)
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('sublinha', $subLinha['id']) }}">
                    <span class="align-middle">{{ $subLinha['nome'] }}</span>
                </a>
            </li>
            @endforeach
            @endif
            @endif
            {{-- <li class="sidebar-item">
                <a href="#projetos" data-toggle="collapse" class="sidebar-link" aria-expanded="false">
                    <i class="fas fa-clipboard"></i><span class="align-middle">Requisições</span>
                </a>
                <ul id="projetos" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="/tiposolicitacao">Cadastrar novo</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Consultar</a></li>

                    <li class="sidebar-item"><a class="sidebar-link" href="#">Análise
                            Técnica</a></li>

                </ul>
            </li> --}}
            {{-- @endif --}}

            <li class="sidebar-header">
                Administração/Configuração
            </li>
            {{-- <li class="sidebar-item">
                <a href="#usuarios" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="fas fa-chart-line"></i> 
                    <span class="align-middle">Usuários</span>
                </a>
                <ul id="usuarios" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item {{ $isActive( '' ) }}"><a class="sidebar-link"
                            href="{{ route( 'usuarios' ) }}">Gerenciar</a></li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="{{ route( 'cadastrar-usuario' ) }}">Adicionar</a></li>
                </ul>
            </li> --}}

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route( 'usuarios' ) }}">
                    <span class="align-middle">Usuários</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route( 'modelos' ) }}">
                    <span class="align-middle">Modelos</span>
                </a>
            </li>
        </ul>
    </div>
</nav>