@component($typeForm, get_defined_vars())
    <div data-controller="location" data-location-edit={{ $edit }} data-location-region={{ $regionID }}
        data-location-city={{ $cityID }} data-location-area={{ $areaID }}
        data-location-subways={{ $subways }}>
        @foreach ($inputs as $input)
            <div class="form-group">
                <label for="{{ $input['id'] }}" class="form-label">{{ $input['title'] }}</label>
                <select class="form-control" {{ isset($input['default']) ? '' : 'disabled' }} name="{{ $input['name'] }}"
                    id="{{ $input['id'] }}" autocomplete="off" {{ isset($input['multiple']) ? 'multiple' : '' }} {{ true ? 'data-set-x="e"' : '' }}>
                    @if (!isset($multiple))
                        <option selected="selected" disabled>{{ $input['placeholder'] }}</option>
                    @endif
                </select>
            </div>
        @endforeach
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
