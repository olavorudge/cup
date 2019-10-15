@php
    $name = isset( $name ) ? $name : "";
    $value = isset( $value ) ? $value : "";
@endphp

<div class="form-group col col-xs-12 {{ isset($size) ? ("col-" . $size) : "" }}">
    <label>
        {{ $slot }}
    </label>
    <input type="text" name="{{ $name }}" class="form-control form-control-sm" value="{{ $value }}">
</div>