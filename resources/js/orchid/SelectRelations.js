import RelationBunch from './RelationBunch';
/**
 *
 * Элементы связаны по цепочке от элемента с default: true;
 * Элементом с multiple: true может быть только последний элемент
 * в этой цепочке, то есть не имеющий поля disable.
 *
 * options = {
 *  element: HTMLElement,       --- получаем из window.Controller (this.element)
 *  rows: boolean,              --- указывает есть ли возможность динамически добавлять новые группы полей
 *  create: {                   --- объект хранит информацию о полях в группе
 *   key: {
 *    default: true,            --- указывает является ли элемент первым(доступным всегда). может быть только один элемент с default: true.
 *    multiple: true,           --- указывает есть ли у элемента возможность множественного выбора. С возможностью выбора может быть только "последний" элемент в группе.
 *    dataID: string            --- идентификатор элемента в группе
 *    disable: string           --- указывает зависимое поле.
 *    data: array [             ---  массив элементов для выбора
 *     {
 *       relation: number       --- id связанного элемента при котором список активен (у элемента с default: true отсутствует)
 *       name: string           --- отображаемое имя
 *       id: number             --- value элемента, отображаемое при отправке формы, а так же служит для активации связанного списка
 *     }
 *    ]
 *   }
 *  }
 * }
 *
 */

export default class SelectRelations {
  start = true;
  container = null;
  template = null;
  addButton = null;
  rows = [];

  constructor(options) {
    this.options = options;
    this.element = options.element;
    this.container = this.element.querySelector('[data-container]');
    this.initBunchs();
    this.start = false;
  };

  async initBunchs() {
    const rows = this.element.querySelectorAll('[data-row]');
    rows.forEach(row => {
      this.rows.push(new RelationBunch(row, this.container, this.options, this.start));
    });
    if (this.options.rows) {
      const template = this.element.querySelector('[data-template]');
      this.template = template.innerHTML;
      this.element.removeChild(template);
      this.addButton = this.element.querySelector('[data-add]') || null;
      this.addButton.addEventListener('click', this.addNewSet.bind(this));
    }
  }

  addNewSet() {
    const newSet = document.createElement('div');
    newSet.classList.add('mb-3');
    newSet.setAttribute('data-row', '');
    newSet.innerHTML = this.template;
    this.rows.push(new RelationBunch(newSet, this.container, this.options, this.start));
    this.container.append(newSet);
  };
}

