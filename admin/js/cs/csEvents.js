import * as ui from './uiCS.js';
export const onEnableChange = (e) => {
    // console.log(e)
    const row = e.target.dataset.row;
    const disabledControlSnippets = document.querySelectorAll('[data-row="' + row + '"]');

    [].forEach.call(disabledControlSnippets, function(el) {


        el.classList.remove('opacity-50');

        el.removeAttribute('disabled');
        el.removeAttribute('readonly');
    });

}


[].forEach.call(ui.enableCheckboxes, function(El) {
    El.onchange = onEnableChange;
});