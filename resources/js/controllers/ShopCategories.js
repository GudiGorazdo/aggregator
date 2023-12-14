import SelectRelations from "./SelectRelations"

export default class extends window.Controller {
  connect() {
    const options = {
      element: this.element,
      rows: Number(this.data.get('rows')),
      create: {
        category: {
          default: true,
          dataID: 'select-category',
          disable: 'subCategories',
          data: [],
        },
        subCategories: {
          dataID: 'select-subcategories',
          multiple: true,
          data: [],
        },
      }
    }

    const getData = async () => {
      const response = await fetch('/api/data/allCategories');
      const data = await response.json();
      data.forEach(category => {
        options.create.category.data.push(category);
        options.create.subCategories.data.push({ relation: category.id, items: category.sub_categories });
      });
    };

    (async () => {
      await getData();
      const worker = new SelectRelations(options);
    })();
  }
}
