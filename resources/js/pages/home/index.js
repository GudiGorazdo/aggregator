import "./hero";
import "../../layouts/similar-categories";
import "../../layouts/similar-locations";
import FiltersUIController from "./FiltersUIController";
import Location from "../../modules/filters/Location";
import YandexMapWorker from "../../modules/YandexMapWorker";
import Categories from "../../modules/filters/Categories";

document.addEventListener("DOMContentLoaded", () => {
  new YandexMapWorker();
  new Location();
  new Categories('sub_categories[]');
  new FiltersUIController();
});
