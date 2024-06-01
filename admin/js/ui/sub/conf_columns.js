// conf_columns.js
import * as ui from '.././uiAdmin.js';
const switcherFieldsetToggle = document.querySelector('[name="switcherFieldsetToggle"]');
const selectEl = document.querySelector('select[name="configSelector"]');
const fieldset = document.querySelector("#selectConfigFieldset");
//conf_columns
switcherFieldsetToggle.addEventListener('change', function(event) {
    let switcher = event.target;
    let lablel = switcher.nextElementSibling;
    let ico = lablel.firstChild;
    if (switcher.checked) {
        fieldset.disabled = false;
        ico.className = "bi bi-unlock-fill text-primary";
    } else {
        fieldset.disabled = true;
        ico.className = "bi bi-lock-fill text-danger";
    }
});
selectEl.onchange = (event) => {
    let sender = event.target;
    console.log(sender.value)
}