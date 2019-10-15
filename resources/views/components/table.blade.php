@php
$id = isset( $id ) ? $id : "";
@endphp
<table class="table table-hover" id="{{ $id }}">
    <thead>
        @if ( isset( $colunas ) )
        <tr>
            @foreach ($colunas as $coluna)
            <th>{{ $coluna['label'] ?? $coluna['key'] }}</th>
            @endforeach
        </tr>
        @endif
    </thead>
    <tbody>
        @if ( isset( $linhas ) && is_array( $linhas ) && count( $linhas ) > 0 )
        @php $countColunas = isset( $colunas ) ? count( $colunas ) : count( $linhas[0] ) @endphp
        @foreach ($linhas as $linha)
        <tr>
            @foreach($colunas as $coluna)
            <td>
                @if ( isset( $coluna['render'] ) )
                @php $render = $coluna['render'] @endphp
                {!! $render($linha) !!}
                @else
                @php $key = $coluna['key'] @endphp
                {{ $linha->$key }}
                @endif
            </td>
            @endforeach
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div class="table-pagination">
    <ul class="pagination">
        <li class="paginate_button page-item previous disabled" id="datatables-basic_previous">
            <a href="#" class="page-link">Anterior</a></li>
        <li class="paginate_button page-item active">
            <a href="#" class="page-link">1</a></li>
        <li class="paginate_button page-item">
            <a href="#" class="page-link">2</a></li>
        <li class="paginate_button page-item">
            <a href="#" class="page-link">3</a></li>
        <li class="paginate_button page-item next" id="datatables-basic_next">
            <a href="#" class="page-link">Próximo</a></li>
    </ul>
</div>