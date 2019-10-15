<div class="col {{ isset($size) ? ("col-" . $size) : "" }}">
    <div class="custom-file form-control-sm">
        <input type="file" accept="{{ $type }}" class="custom-file-input" id="customFile">
        <label class="custom-file-label" for="customFile">
            {{ $slot }}
        </label>
    </div>
</div>