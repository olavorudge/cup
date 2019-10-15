@extends( 'layouts.app' )

{{-- @section('title', 'Home') --}}

@section('content')
@foreach ($linhas as $linha)
<div class="card product-line-card">
    @if ( empty( $linha->subLinhas ) )
    <a href="{{ route( 'sublinha', $linha->id ) }}" class="card-header list-group-item-action">{{ $linha->nome }}</a>
    @else
    <div class="card-header" data-toggle="collapse" data-target="{{ '#card-items-' . $loop->index }}">
        {{ $linha->nome }}
        <span data-toggle="tooltip" class="material-icons">chevron_right</span>
    </div>
    <div class="list-group list-group-flush collapse" id="{{ 'card-items-' . $loop->index }}">
        @foreach ($linha->subLinhas as $subLinha)
        <a href="{{ route( 'sublinha', $subLinha['id'] ) }}"
            class="list-group-item list-group-item-action">{{ $subLinha['nome'] }}</a>
        @endforeach
    </div>
    @endif
</div>
@endforeach
@endsection