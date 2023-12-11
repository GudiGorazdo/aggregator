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
                    <div class="col-12 col-md form-group mb-md-0 pe-md-0">
                        <input class="form-control" type="text" name="{{ $name }}[]"
                            value="{{ $fieldValue }}">
                    </div>
                @endif
                <div class="col-12 col-md form-group mb-md-0">
                    <button type="button" class="btn btn-danger"
                        data-field-remove="{{ $fieldName }}">Удалить</button>
                </div>
            </div>
        @endforeach
    @endif

    <div class="row form-group align-items-baseline" data-field-name="0">
        <div class="col-12 col-md form-group mb-md-0 pe-md-0">
            <input class="form-control" type="text" name="{{ $name }}[]">
        </div>
        <div class="col-12 col-md form-group mb-md-0">
            <button type="button" class="btn btn-danger" data-field-remove="0">Удалить</button>
        </div>
    </div>
</div>

<button id="{{ $id }}-add" type="button" class="btn btn-primary">Добавить поле</button>

<script>
    (() => {
        const worker = {
            container: document.getElementById('{{ $id }}-container'),
            addButton: document.getElementById('{{ $id }}-add'),
            template: null,

            init() {
                this.template = this.container.querySelector('.form-group').cloneNode(true);
                this.container.addEventListener('click', this.handleClick.bind(this));
                this.addButton.addEventListener('click', this.addNewField.bind(this));
            },

            handleClick(event) {
                if (event.target.dataset.fieldRemove) {
                    this.container.removeChild(this.container.querySelector(
                        `[data-field-name="${event.target.dataset.fieldRemove}"]`));
                }
            },

            getNewFieldName() {
                let newFieldName = `field_${Math.round(Math.random() * 10000)}`;
                while (this.container.querySelector(`[data-field-name="${newFieldName}"]`)) {
                    newFieldName = `field_${Math.round(Math.random() * 10000)}`;
                };

                return newFieldName;
            },

            addNewField() {
                const newIndex = this.container.children.length;
                let newFieldName = this.getNewFieldName();

                const newField = this.template.cloneNode(true);
                const button = newField.querySelector('[data-field-remove]');
                newField.dataset.fieldName = newFieldName;
                button.dataset.fieldRemove = newFieldName;

                const inputElement = newField.querySelector('input');
                inputElement.name = '{{ $name }}[]';
                inputElement.value = '';

                this.container.appendChild(newField);
            },
        }.init();
    })();
</script>
