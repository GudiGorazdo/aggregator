import FilterBase from './FilterBase';

export default class Options extends FilterBase {
  inputs = {};

  constructor(fields) {
    super(fields);
    const urlParams = new URLSearchParams(window.location.search);
    for (let field in fields) {
      this.inputs[field] = document.getElementById(fields[field]);
      const startValue = urlParams.get(fields[field]);
      startValue && (this.inputs[field].checked = true);
      this.inputs[field].addEventListener('change', this.apply.bind(this));
    }
  }

  apply(e) {
    this.filterApply();
  }

  setURLparams(urlParams) {
    for(let input in this.inputs) {
      this.inputs[input].checked
        && urlParams.append(this.fields[input], this.inputs[input].value);
    }
  }
}
