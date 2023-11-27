
import FilterBase from './FilterBase';

export default class Rating extends FilterBase {
  selectors = {
    inputs: '[type="radio"][name="rating"]',
  }

  urlParam = 'rating';
  inputs = [];
  value = '3';

  constructor(fields) {
    super(fields);
    this.inputs = document.querySelectorAll(this.selectors.inputs);
    const urlParams = new URLSearchParams(window.location.search);
    this.value = urlParams.get(this.urlParam) ?? this.value;
    this.inputs.forEach(input => {
      this.value === input.value && (input.checked = true);
      this.value !== input.value && (input.checked = false);

      input.addEventListener('click', this.apply.bind(this));
    });
  }

  apply(e) {
    this.value = e.target.value;
    this.filterApply();
  }

  setURLparams(urlParams) {
    urlParams.append(this.urlParam, this.value);
  }
}
