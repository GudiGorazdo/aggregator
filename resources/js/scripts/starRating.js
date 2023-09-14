import '../plugins/star-rating/star-rating.min.css';
import { StarRating } from '../plugins/star-rating/star-rating.min';


console.log('WORK!!')
document.addEventListener('DOMContentLoaded', () => {
  var starRatingControl = new StarRating(".star-rating", {
    maxStars: 5,
    tooltip: false,
  });
});


