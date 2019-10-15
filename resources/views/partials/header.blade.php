@php
    $id = request()->get( 'linha' );
    $linha = $id ? 'ABR.EF - Ensino Fundamental' : '';
@endphp

<nav class="navbar navbar-expand navbar-light bg-white">
    <div>
        {{ $linha }}
    </div>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    <span class="text-dark">Alexandre Grocholski</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user align-middle mr-1">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> Perfil</a>
                    {{-- <a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-pie-chart align-middle mr-1">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg> Analytics</a> --}}
                    <div class="dropdown-divider"></div>
                    {{-- <a class="dropdown-item" href="pages-settings.html">Settings &amp; Privacy</a>
                    <a class="dropdown-item" href="#">Help</a> --}}
                    <a class="dropdown-item" href="{{ route( 'logout' ) }}">Sair</a>
                </div>
            </li>
        </ul>
    </div>
</nav>