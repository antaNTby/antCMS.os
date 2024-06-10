import * as ui from './uiCS.js';
console.log(ui)
export const onEnableChange = (e) => {
    // console.log(e)
    const row = e.target.dataset.row;
    const ControlSnippetsToEnable = document.querySelectorAll('[data-row="' + row + '"]:not([name="checkbox_enable"])');
    console.log(ControlSnippetsToEnable)
    if (e.target.checked) {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            unblockCS(el);
        });
    } else {
        [].forEach.call(ControlSnippetsToEnable, function(el) {
            blockCS(el);
        });
    }
};
[].forEach.call(ui.enableCheckboxes, function(el) {
    el.onchange = onEnableChange;
});
export const onControlSnippetChange = (e) => {
    let el = e.target;
    // console.log(el);
    blockCS(el);
    csDefaultCallbackFunction(e);
    // unblockCS(el)
};
[].forEach.call(ui.allControlSnippets, function(el) {
    el.onchange = onControlSnippetChange;
});

function blockCS(el) {
    el.classList.add('opacity-50');
    el.classList.remove('text-danger');
    el.setAttribute('disabled', '1');
    el.setAttribute('readonly', '1');
}

function unblockCS(el) {
    el.classList.remove('opacity-50');
    el.classList.add('text-danger');
    el.removeAttribute('disabled');
    el.removeAttribute('readonly');
}
async function csDefaultCallbackFunction(e) {
    let url = checkOnUrl(document.location.href) + '&operation=updateCSValue';
    const el = e.target;

    const parentTD = el.closest('td');
    const parentTR = el.closest('tr');
    const editID = parentTR.dataset.id;

    const fieldName = el.dataset.fieldName;
    const newValue = el.value;
    const oldValue = parentTD.dataset.value;
    const rowNumber = el.dataset.rowNumber;
    const DATA = {
        "editID": editID,
        "fieldName": fieldName,
        "newValue": newValue,
        "oldValue": oldValue,

        "rowNumber": rowNumber,
    };
    let defaultResponse = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(DATA)
    });
    let result = await defaultResponse.json();
    // alert(result.message);
    console.log("result", result)
    // console.log("myAjax", myAjax)
}