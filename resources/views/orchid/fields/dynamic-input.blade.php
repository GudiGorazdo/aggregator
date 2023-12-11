@if (isset($title))
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
@endif

<div id="{{ $id }}-container">
    @if (isset($values))
        @foreach ($values as $fieldName => $fieldValue)
            <div class="row form-group align-items-baseline" data-field-name="{{ $fieldName }}">
                @if (isset($useNaames) && $useNames)
                    <div class="col-12 col-md form-group mb-md-0 pe-md-0">
                        <div class="form-group">
                            <input class="form-control" type="text" name="{{ $name }}[name]"
                                value="{{ $fieldName }}">
                        </div>
                    </div>
                    <div class="col-12 col-md form-group mb-md-0">
                        <div class="form-group">
                            <input class="form-control" type="text" name="{{ $name }}[value]"
                                value="{{ $fieldValue }}">
                        </div>
                    </div>
                @else
                    <div class="form-group">
                        <input class="form-control" type="text" name="{{ $name }}[]" value="{{ $fieldValue }}">
                    </div>
                @endif
                <div class="col-12 col-md form-group mb-md-0">
                    <button type="button" class="btn btn-danger"
                        onclick="removeField('{{ $fieldName }}')">Удалить</button>
                </div>
            </div>
        @endforeach
    @endif

    <div class="form-group" style="display: none">
        <input class="form-control" type="text" name="{{ $name }}[]">
        <button type="button" class="btn btn-danger" onclick="removeNewField(this)">Удалить</button>
    </div>
</div>

<button type="button" class="btn btn-primary" onclick="addField()">Добавить поле</button>

<script>
    function removeField(fieldName) {
        var container = document.getElementById('{{ $id }}-container');
        var fieldToRemove = container.querySelector('[data-field-name="' + fieldName + '"]');
        if (fieldToRemove) {
            container.removeChild(fieldToRemove);
        }
    }

    function removeNewField(button) {
        var container = document.getElementById('{{ $id }}-container');
        var newField = button.closest('.form-group');
        container.removeChild(newField);
    }

    function addField() {
        var container = document.getElementById('{{ $id }}-container');
        var newIndex = container.children.length;
        var newFieldName = newIndex;

        var newField = container.querySelector('.form-group').cloneNode(true);
        newField.style.display = 'flex';

        var inputElement = newField.querySelector('input');
        inputElement.name = '{{ $name }}[' + newFieldName + ']';
        inputElement.value = '';

        container.appendChild(newField);
    }
</script>
