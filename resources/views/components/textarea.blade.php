@php
    $name = isset( $name ) ? $name : "";
    $value = isset( $value ) ? $value : "";
@endphp

<div class="form-group col col-xs-12 {{ isset($size) ? ("col-" . $size) : "" }}">
    <label>
        {{ $slot }}
    </label>
    <textarea name="{{ $name }}" class="form-control">{{ $value }}</textarea>
</div>