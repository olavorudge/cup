<div class="form-group col col-xs-12 {{ isset($size) ? ("col-" . $size) : "" }}">
    <label>
        {{ $slot }}
    </label>
    <select class="form-control form-control-sm">
        @foreach ($options as $option)
        @if (is_array( $option ))
            <option value="{{ $option[1] }}">{{ $option[0] }}</option>
        @else
            <option value="{{ $option }}">{{ $option }}</option>
        @endif
        @endforeach
    </select>    
</div>