<div class="col-12 col-md form-group mb-md-0 pe-md-0">
    <div class="form-group">
        <input class="form-control" type="text" data-input-type="name"
            name="{{ $name }}[{{ $index }}][name]" value="{{ $fieldName }}">
    </div>
</div>
<div class="col-12 col-md form-group mb-md-0">
    <div class="form-group">
        <input class="form-control" type="text" data-input-type="value"
            name="{{ $name }}[{{ $index }}][value]"
            value="{{ $fieldValue }}">
    </div>
</div>
