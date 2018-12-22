var _createClass = function () {function defineProperties(target, props) {for (var i = 0; i < props.length; i++) {var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);}}return function (Constructor, protoProps, staticProps) {if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;};}();function _classCallCheck(instance, Constructor) {if (!(instance instanceof Constructor)) {throw new TypeError("Cannot call a class as a function");}}var Form = function () {
  function Form(el) {_classCallCheck(this, Form);
    this.el = el;
    this.items = [].slice.call(this.el.querySelectorAll('.codepen-form__item'));
    this.inputs = this.items.map(function (item) {return item.querySelector('.form-control');});
    this.activeIndex = 0;

    this.setEvents();
  }_createClass(Form, [{ key: 'setEvents', value: function setEvents()

    {
      this.setKeyDown();
    } }, { key: 'setKeyDown', value: function setKeyDown()

    {var _this = this;
      window.addEventListener('keydown', function (e) {
        // Enter
        if (e.keyCode === 13) {
          e.preventDefault();

          _this.active = false;
          _this.activeIndex += 1;

          if (_this.activeIndex > _this.items.length - 1) {
            _this.setFormModifierClass();
            _this.showAllItems();
          } else {
            _this.setActiveClass();
          }
        }

        // Any
        if (!_this.active) {
          _this.inputs[_this.activeIndex].focus();
        }
      });
    } }, { key: 'setActiveClass', value: function setActiveClass()

    {var _this2 = this;
      this.items.forEach(function (item, index) {
        if (index === _this2.activeIndex) {
          item.classList.add('active');
        } else {
          item.classList.remove('active');
        }
      });
    } }, { key: 'showAllItems', value: function showAllItems()

    {
      this.items.forEach(function (item) {
        item.classList.add('active');
      });
    } }, { key: 'setFormModifierClass', value: function setFormModifierClass()

    {
      this.el.classList.add('codepen-form--complete');
    } }]);return Form;}();


var codepenFormElement = document.querySelector('.codepen-form');
var codepenForm = new Form(codepenFormElement);