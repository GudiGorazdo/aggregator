import SelectRelations from "./SelectRelations"

export default class extends window.Controller {
  connect() {
    const options = {
      edit: Number(this.data.get('edit')),
      create: {
        category: {
          default: true,
          current: Number(this.data.get('category')) ?? null,
          id: 'select-category',
          disable: 'subCategories',
          data: [],
        },
        subCategories: {
          current:  this.data.get('subCategories').split(',').map(Number) ?? null,
          id: 'select-subcategories',
          multiple: true,
          data: [],
        },
      }
    }

    // const getData = async () => {
    //   const response = await fetch('/api/data/allLocations');
    //   const data = await response.json();
    //   data.forEach(region => {
    //     options.create.region.data.push(region);
    //     options.create.city.data.push({relation: region.id, items: region.cities});
    //     region.cities.forEach(city => {
    //       options.create.area.data.push({relation: city.id, items: city.areas ?? []});
    //       city.areas.forEach(area => {
    //         options.create.subways.data.push({relation: area.id, items: area.subways ?? []});
    //       });
    //     });
    //   });
    // };

    (async () => {
      // await getData();
      // const worker = new SelectRelations(options);
    })();
  }
}
