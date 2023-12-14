import SelectRelations from "./SelectRelations"

export default class extends window.Controller {
  connect() {
    const options = {
      element: this.element,
      edit: false,
      // edit: Number(this.data.get('edit')),
      rows: Number(this.data.get('rows')),
      create: {
        region: {
          default: true,
          // current: Number(this.data.get('region')) ?? null,
          dataID: 'select-region',
          disable: 'city',
          data: [],
        },
        city: {
          // current: Number(this.data.get('city')) ?? null,
          dataID: 'select-city',
          disable: 'area',
          data: [],
        },
        area: {
          // current: Number(this.data.get('area')) ?? null,
          dataID: 'select-area',
          disable: 'subways',
          data: [],
        },
        subways: {
        //   current: this.data.get('subways').split(',').map(Number) ?? null,
          multiple: true,
          dataID: 'select-subways',
          data: [],
        },
      }
    }

    const getData = async () => {
      const response = await fetch('/api/data/allLocations');
      const data = await response.json();
      data.forEach(region => {
        options.create.region.data.push(region);
        options.create.city.data.push({relation: region.id, items: region.cities});
        region.cities.forEach(city => {
          options.create.area.data.push({relation: city.id, items: city.areas ?? []});
          city.areas.forEach(area => {
            options.create.subways.data.push({relation: area.id, items: area.subways ?? []});
          });
        });
      });
    };

    (async () => {
      await getData();
      const worker = new SelectRelations(options);
    })();
  }
}
