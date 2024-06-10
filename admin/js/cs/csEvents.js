import * as ui from './uiCS.js';
export const onEnableChange = (e) => {
    // console.log(e)
    const row = e.target.dataset.row;
    const ControlSnippetsToEnable = document.querySelectorAll('[data-row="' + row + '"]:not([name="checkbox_enable"])');
    console.log(ControlSnippetsToEnable)
    if (e.target.checked) {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            el.classList.remove('opacity-50');
            el.classList.add('text-danger');
            el.removeAttribute('disabled');
            el.removeAttribute('readonly');
        });
    } else {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            el.classList.add('opacity-50');
            el.classList.remove('text-danger');
            el.setAttribute('disabled', '1');
            el.setAttribute('readonly', '1');
        });
    }
};

[].forEach.call(ui.enableCheckboxes, function(El) {
    El.onchange = onEnableChange;
});