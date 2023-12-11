@if (isset($title))
    <label for="{{ $id }}" class="form-label">{{ $title }}</label>
@endif

<div id="{{ $id }}-container">
    @if (isset($values) && $values)
        @foreach (array_keys($values) as $index => $fieldName)
            <div class="row form-group align-items-baseline" data-field-index="{{ $index }}">
                @if (isset($useNames) && $useNames)
                    @include('orchid.fields.input-with-name', [
                        'name' => $name,
                        'index' => $index,
                        'fieldName' => $fieldName,
                        'fieldValue' => $values[$fieldName],
                    ])
                @else
                    <div class="col-12 col-md form-group mb-md-0 pe-md-0">
                        <input class="form-control" type="text" name="{{ $name }}[]"
                            value="{{ $values[$fieldName] }}">
                    </div>
                @endif
                <div class="col-12 col-md form-group mb-md-0">
                    <button type="button" class="btn btn-danger"
                        data-field-remove="{{ $index }}">Удалить</button>
                </div>
            </div>
        @endforeach
    @else
        <div class="row form-group align-items-baseline" data-field-index="0">
            @if (isset($useNames) && $useNames)
                @include('orchid.fields.input-with-name', [
                    'name' => $name,
                    'index' =>0,
                    'fieldName' => '',
                    'fieldValue' => '',
                ])
            @else
                <div class="col-12 col-md form-group mb-md-0 pe-md-0">
                    <input class="form-control" type="text" name="{{ $name }}[]">
                </div>
            @endif
            <div class="col-12 col-md form-group mb-md-0">
                <button type="button" class="btn btn-danger" data-field-remove="0">Удалить</button>
            </div>
        </div>
    @endif
</div>

<div class="col-12 col-md form-group mb-md-0 py-3">
    <button id="{{ $id }}-add" type="button" class="btn btn-primary">Добавить поле</button>
</div>

<script>
    (() => {
        const worker = {
            name: '{{ $name }}',
            useNames: {{ isset($useNames) ? 1 : 0 }},
            container: document.getElementById('{{ $id }}-container'),
            addButton: document.getElementById('{{ $id }}-add'),
            template: null,

            init() {
                console.log(this.useNames);
                this.template = this.container.querySelector('.form-group').cloneNode(true);
                this.container.addEventListener('click', this.handleClick.bind(this));
                this.addButton.addEventListener('click', this.addNewField.bind(this));
            },

            handleClick(event) {
                if (event.target.dataset.fieldRemove) {
                    this.container.removeChild(this.container.querySelector(
                        `[data-field-index="${event.target.dataset.fieldRemove}"]`));
                }
            },

            getRandomNumber() {
                return Math.round(Math.random() * 1000);
            },

            getNewFieldIndex() {
                let index = +this.container.lastElementChild.dataset.fieldIndex;
                return ++index;
            },

            addNewField() {
                if (this.useNames) return this.addFieldWithNames();
                else return this.addFieldWithoutNames();
            },

            addFieldWithNames() {
                let index = this.getNewFieldIndex();

                const newField = this.template.cloneNode(true);
                newField.dataset.fieldIndex = index;
                const button = newField.querySelector('[data-field-remove]');
                button.dataset.fieldRemove = index;

                const inputElementName = newField.querySelector('[data-input-type="name"]');
                inputElementName.setAttribute('name', `${this.name}[${index}]['name']`);
                inputElementName.setAttribute('value', '');

                const inputElementValue = newField.querySelector('[data-input-type="value"]');
                inputElementValue.setAttribute('name', `${this.name}[${index}]['value']`);
                inputElementValue.setAttribute('value', '');

                this.container.appendChild(newField);
            },

            addFieldWithoutNames() {
                let index = this.getNewFieldIndex();

                const newField = this.template.cloneNode(true);
                newField.dataset.fieldIndex = index;
                const button = newField.querySelector('[data-field-remove]');
                button.dataset.fieldRemove = index;

                const inputElement = newField.querySelector('input');
                inputElement.setAttribute('name', `${this.name}[]`);
                inputElement.setAttribute('value', '');

                this.container.appendChild(newField);
            },
        }.init();
    })();
</script>
