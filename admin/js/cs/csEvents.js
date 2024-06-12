import * as ui from './uiCS.js';
import * as bsToast from '../../apps/Toasts/appToasts.js';
console.log(ui)

// для "enable" чекбоксов
export const onEnableChange = (e) => {
    const row = e.target.dataset.rowNumber;
    const ControlSnippetsToEnable = document.querySelectorAll('[data-row-number="' + row + '"]:not([name="checkbox_enable"])');
    if (e.target.checked) {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            ui.unblockCS(el);
        });
    } else {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            ui.blockCS(el);
        });
    }
};
ui.enableCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', onEnableChange);
});

// для ВСЕХ чекбоксов
export const onCheckboxChange = (e) => {
    const el = e.target;
    if (el.checked) {
        el.value = 1;
    } else {
        el.value = 0;
    }

};
ui.allCheckBoxes.forEach(checkbox => {
    checkbox.addEventListener('change', onCheckboxChange);
});

// для ВСЕХ ControlSnippet
export const onControlSnippetChange = (e) => {
    const el = e.target;
    ui.blockCS(el);
    csDefaultCallbackFunction(el);
};
ui.allControlSnippets.forEach(cs => {
    cs.addEventListener('change', onControlSnippetChange);
});

// [].forEach.call(ui.allControlSnippets, function(el) {
//     el.onchange = onControlSnippetChange;
// });

async function csDefaultCallbackFunction(el) {
    // let url = checkOnUrl(document.location.href) + '&operation=updateCSValue';
    let url = 'admin/admin.php' + '?app=controlSnippetsProcessor' + '&operation=updateCSValue';

    const primaryID = el.dataset.primaryId;

    const configName = el.dataset.configName;
    const fieldName = el.dataset.fieldName;
    const newValue = el.value;
    const oldValue = el.dataset.oldValue;
    const rowNumber = el.dataset.rowNumber;

    const DATA = {
        "primaryID": primaryID,
        "configName": configName,
        "fieldName": fieldName,
        "newValue": newValue,
        "oldValue": oldValue,
        "rowNumber": rowNumber,
    };

    let myResponse = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(DATA)
    });

    let result = await myResponse.json();

    ui.unblockCS(el);
    el.dataset.oldValue=newValue;

    if (result.message) {
        if (result.errors === false) {
            bsToast.showToast(result.message, "Удачно", "success");
        } else {
            result.errors.forEach(e => {
                bsToast.showToast(e, "Ошибка", "danger");
            })
        }
    }

}