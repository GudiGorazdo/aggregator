import "../../layouts/hero";
import "../../layouts/filters";
import "../../layouts/similar-categories";
import "../../layouts/similar-locations";
import Location from "../../modules/filters/Location";
import YandexMapWorker from "../../modules/YandexMapWorker";

document.addEventListener("DOMContentLoaded", () => {
  new Location();
  new YandexMapWorker();
});
