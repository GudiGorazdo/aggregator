
import FilterBase from './FilterBase';

export default class Rating extends FilterBase {
  selectors = {
    inputs: '[type="radio"][name="rating"]',
    container: 'filter-rating',
  }

  urlParam = 'rating';
  inputs = [];
  defaultValue = '3';

  constructor(fields) {
    super(fields);
    this.inputs = document.querySelectorAll(this.selectors.inputs);
    this.container = document.getElementById(this.selectors.container);
    this.container.addEventListener('click', this.apply.bind(this));
    this.setInputsState();
  }

  setInputsState() {
    const urlParams = new URLSearchParams(window.location.search);
    const value = urlParams.get(this.urlParam) ?? this.defaultValue;
    this.inputs.forEach(input => {
      value === input.value && (input.checked = true);
      value !== input.value && (input.checked = false);
    });
  }

  apply(e) {
    if (e.target.name === 'rating') {
      this.value = e.target.value;
      this.filterApply();
    }
  }

  setURLparams(urlParams) {
    urlParams.append(this.urlParam, this.value);
  }

  reset() {
    this.setInputsState();
  }
}
