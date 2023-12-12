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
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const worker = {
            start: true,
            api: '/api/data/allLocations',
            data: null,

            edit: false,

            el: {
                region: null,
                city: null,
                area: null,
                subways: null,
            },

            current: {
                region: null,
                city: null,
                area: null,
                subways: null,
            },

            disableMap: {
                region: 'city',
                city: 'area',
                area: 'subways',
            },

            async init() {
                this.setEditData();
                await this.getData();
                this.getEls();
                if (this.edit) {
                    Object.keys(this.current).forEach(type => this.setOptions(type));
                } else {
                    this.setOptions('region');
                }
                this.checkDisabled();
                this.start = false;
            },

            setEditData() {
                this.edit = !!{{ $edit }};
                if (!this.edit) return;
                this.current.region = !!{{ $regionID }} ? {{ $regionID }} : null;
                this.current.city = !!{{ $cityID }} ? {{ $cityID }} : null;
                this.current.area = !!{{ $areaID }} ? {{ $areaID }} : null;
                this.current.subways = !!{!! $subways !!} ? {!! $subways !!} : null;
            },

            setCurrent(event) {
                const { type } = event.target.dataset;
                const value = +event.target.value;
                if (type === 'subways') {
                    return this.setCurrentSubways();
                }
                this.current[type] = value;
                this.checkDisabled(type);
                this.resetOptions(type);
                this.setOptions(this.disableMap[type]);
            },

            setCurrentSubways(value) {
                this.current.subways.push(value);
            },

            getRenderArray(type) {
                if (type === 'region') return this.data;
                const region = this.data.find(region => region.id === this.current.region);
                const city = region && region.cities.find(city => city.id === this.current.city);
                const area = city && city.areas.find(area => area.id === this.current.area);
                switch (type) {
                    case 'city':
                        return region && region.cities;
                        break;
                    case 'area':
                        return city?.areas;
                        break;
                    case 'subways':
                        return area?.subways;
                        break;
                }
            },

            setOptions(type) {
                const array = this.getRenderArray(type);
                array && array.forEach(item => this.createOptionEl(item.id, item.name, type));
            },

            resetOptions(type) {
                if (type === 'subways') return;
                if (type === 'region') {
                    this.resetCityData();
                    this.el.area.setAttribute('disabled', true);
                }
                if (type === 'city' || type === 'region') {
                    this.resetAreaData();
                    this.el.subways.setAttribute('disabled', true);
                }
                this.resetSubwaysData();
            },

            resetCityData() {
                this.current.city = null;
                this.removeOptions('city');
            },

            resetAreaData() {
                this.current.area = null;
                this.removeOptions('area');
            },

            resetSubwaysData() {
                this.current.subways = [];
                this.el.subways.innerHTML = '';
            },

            removeOptions(type) {
                this.current[type] = null;
                const elChilds = this.el[type].children;
                for (var i = elChilds.length - 1; i > 0; i--) {
                    elChilds[i].removeEventListener('click', this.setCurrent);
                    this.el[type].removeChild(elChilds[i]);
                }
            },

            createOptionEl(value, text, type) {
                const option = document.createElement('option');
                option.setAttribute('value', value);
                option.setAttribute('data-type', type);
                option.textContent = text;
                option.addEventListener('click', this.setCurrent.bind(this));
                if (this.checkSelected(value, type)) {
                    option.setAttribute('selected', 'selected')
                }
                this.el[type].append(option);
            },

            checkSelected(value, type) {
                if (!this.start || !this.edit) return;
                let check;
                if (type === 'subways') {
                    check = this.current.subways.find(subway => subway.id === value);
                    check && (this.current.subways.push(value));
                } else {
                    check = this.current[type] === value;
                    check && (this.current[type] = value);
                }

                if (check) return true;
                return false;
            },

            checkDisabled() {
                Object.keys(this.current).forEach(type => {
                    if (!this.current[type]) return;
                    if (!this.disableMap[type]) return;
                    const el = this.disableMap[type];
                    if (this.el[el]?.hasAttribute('disabled')) {
                        this.el[el].removeAttribute('disabled');
                    }
                });
            },

            getEls() {
                this.el.region = document.getElementById('select-region');
                this.el.city = document.getElementById('select-citiy');
                this.el.area = document.getElementById('select-area');
                this.el.subways = document.getElementById('select-subways');
            },

            async getData() {
                const response = await fetch(this.api);
                this.data = await response.json();
            },
        }.init();
    });
</script>

<style>
    #select-subways {
        height: min-content !important;
    }
</style>
