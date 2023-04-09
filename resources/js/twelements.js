import * as te from "tw-elements";

const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-te-toggle="popover"]'));
popoverTriggerList.map((popoverTriggerEl) => new te.Popover(popoverTriggerEl, {
  customClass: 'text-gray-800'
}));