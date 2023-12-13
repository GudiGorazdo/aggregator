@component($typeForm, get_defined_vars())
    <div id={{ $id }} data-controller="{{ $controller }}" data-{{ $controller }}-edit="{{ $edit }}"
        @foreach ($inputs as $type => $input) data-{{ $controller }}-{{ $type }}="{{ $input['current'] }}" @endforeach>
        <div data-container>
            <div data-template>
                @foreach ($inputs as $input)
                    <div class="form-group">
                        @if (isset($input['title']))
                            <label for="{{ $input['id'] }}" class="form-label">{{ $input['title'] }}</label>
                        @endif
                        <select class="form-control" {{ isset($input['default']) ? '' : 'disabled' }}
                            name="{{ $input['name'] }}" id="{{ $input['id'] }}" autocomplete="off"
                            {{ isset($input['multiple']) ? 'multiple' : '' }}>
                            @if (!isset($multiple))
                                <option selected="selected" disabled>{{ $input['placeholder'] }}</option>
                            @endif
                        </select>
                    </div>
                @endforeach
            </div>
        </div>
        @if ($addButton)
            <button class="btn btn-primary mt-3" data-add type="button">Добавить</button>
        @endif
    </div>
    <style>
        #select-subways {
            height: min-content !important;
        }

        .form-control[disabled] {
            opacity: .4 !important;
        }
    </style>
@endcomponent
