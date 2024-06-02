// conf_columns.js
import * as ui from '.././uiAdmin.js';
const legalOperations=['addNewConfig','updateConfig'];

const switcherFieldsetToggle = document.querySelector('[name="switcherFieldsetToggle"]');
const selectEl = document.querySelector('select[name="configSelector"]');
const fieldset = document.querySelector("#selectConfigFieldset");

const btnOperationAddNew =document.querySelector('button[data-operation="addNewConfig"]');

// const current_sub_id = getUrlComponent('sub', checkOnUrl(document.location.href));
// const current_dpt_id = getUrlComponent('dpt', checkOnUrl(document.location.href));
const configSelectedIndex = getUrlComponent('configSelectedIndex', checkOnUrl(document.location.href));
const operation = getUrlComponent('operation', checkOnUrl(document.location.href));


// console.log([ui.current_dpt_id,ui.current_sub_id,configSelectedIndex])

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
    deleteUrlComponent('configSelectedIndex');
    deleteUrlComponent('operation');
    let url = checkOnUrl(document.location.href) + '&configSelectedIndex='+sender.value;
    console.log(sender.value,url)
    window.location = url;
}

btnOperationAddNew.addEventListener('click', function(event){
     let sender = event.target;
    deleteUrlComponent('operation');
    deleteUrlComponent('configSelectedIndex');
    let url = checkOnUrl(document.location.href) + '&configSelectedIndex='+selectEl.value+'&operation='+'addNewConfig';
    console.log(selectEl.value,url)
    window.location = url;
})