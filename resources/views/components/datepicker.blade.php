<div class="col {{ isset($size) ? ("col-" . $size) : "" }}">
    <label>{{ $slot }}</label>
    <div class="input-group date">    
        <input type="text" class="form-control form-control-sm datepicker" value="">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
</div>
