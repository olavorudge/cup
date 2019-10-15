@php
$id = isset( $id ) ? $id : "";
$size = isset( $size ) ? 'modal-' . $size : "";
$slide = isset( $slide ) ? "modal-dialog-slideout" : "";
@endphp
<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}" aria-hidden="true">
    <div class="modal-dialog {{ $slide }} {{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@yield( 'modal-title' )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @yield( 'modal-body' )
            </div>
            <div class="modal-footer">
                @section( 'modal-footer' )
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                @show
            </div>
        </div>
    </div>
</div>
