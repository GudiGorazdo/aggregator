import FiltersUIController from './FiltersUIController';
import Categories from "./Categories";

const filter = {
  ui: new FiltersUIController(),
  categories: new Categories('sub_categories[]'),
}

