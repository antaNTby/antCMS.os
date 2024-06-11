// uiCS.js
export const enableCheckboxes = document.querySelectorAll('input[type="checkbox"][data-field-name="enable"]');
export const allCheckBoxes = document.querySelectorAll('input[type="checkbox"][data-field-name]');
export const allInputTexts = document.querySelectorAll('input[type="text"][data-field-name]');
export const allInputNumbers = document.querySelectorAll('input[type="number"][data-field-name]');
export const allControlSnippets = document.querySelectorAll('[data-type="control-snippet"]');




export function blockCS(el) {
    el.classList.add('opacity-50');
    // el.classList.remove('text-danger');
    el.setAttribute('disabled', '1');
    el.setAttribute('readonly', '1');
}

export function unblockCS(el) {
    el.classList.remove('opacity-50');
    // el.classList.add('text-danger');
    el.removeAttribute('disabled');
    el.removeAttribute('readonly');
}


