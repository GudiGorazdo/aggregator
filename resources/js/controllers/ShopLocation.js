import SelectRelations from "./SelectRelations"

export default class extends window.Controller {
  connect() {
    const options = {
      edit: Number(this.data.get('edit')),
      create: {
        region: {
          default: true,
          current: Number(this.data.get('region')) ?? null,
          id: 'select-region',
          disable: 'city',
          data: [],
        },
        city: {
          current: Number(this.data.get('city')) ?? null,
          id: 'select-city',
          disable: 'area',
          data: [],
        },
        area: {
          current: Number(this.data.get('area')) ?? null,
          id: 'select-area',
          disable: 'subways',
          data: [],
        },
        subways: {
          current: this.data.get('subways').split(',').map(Number) ?? null,
          multiple: true,
          id: 'select-subways',
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
