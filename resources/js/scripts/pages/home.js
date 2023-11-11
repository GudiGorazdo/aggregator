import "../layouts/hero.js";
import "../layouts/filters.js";
import "../layouts/similar-categories.js";
import "../layouts/similar-locations.js";
import Location from "../../modules/filters/Location";
import YandexMapWorker from "../../modules/YandexMapWorker";

document.addEventListener("DOMContentLoaded", () => {
  new Location();
  new YandexMapWorker();
});
