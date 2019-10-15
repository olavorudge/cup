<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'SISPLAN') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="login-container">
            <form action="/" method="GET">
                <div class="form-row">
                    @input
                        E-mail
                    @endinput
                </div>
                <div class="form-row">
                    @input
                        Senha
                    @endinput
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-primary">Entrar</button>
                </div>

                <div class="text-center mt-3">
                    <a href="/recuperar-senha">Esqueceu sua senha?</a>
                </div>
            </form>
        </div>
    </div>

    @stack('scripts')
</body>
</html>