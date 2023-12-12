@component($typeForm, get_defined_vars())
  <div data-controller="location" data-location-edit={{ $edit }}
        data-location-region={{ $regionID }} data-location-city={{ $cityID }}
        data-location-area={{ $areaID }} data-location-subways={{ $subways }}>
    <div class="form-group">
        <label for="region_id" class="form-label">Регион</label>
        <select class="form-control" name="region_id" id="select-region" autocomplete="off">
            <option selected="selected" disabled>Выберите регион</option>
        </select>
    </div>
    <div class="form-group">
        <label for="citiy_id" class="form-label">Город</label>
        <select class="form-control" disabled name="citiy_id" id="select-citiy" autocomplete="off">
            <option selected="selected" disabled>Выберите город</option>
        </select>
    </div>
    <div class="form-group">
        <label for="citiy_id" class="form-label">Район</label>
        <select class="form-control" disabled name="area_id" id="select-area" autocomplete="off">
            <option selected="selected" disabled>Выберите район</option>
        </select>
    </div>
    <div class="form-group">
        <label for="citiy_id" class="form-label">Метро</label>
        <select class="form-control" disabled name="subways[]" id="select-subways" multiple autocomplete="off"></select>
    </div>
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
