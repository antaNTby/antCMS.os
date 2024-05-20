import * as bsToast from "../../apps/Toasts/appToasts.js";
import katzapskayaMova from "./defaultKatzapskayaMova.js";
import * as standartEvents from "./dtEvents.js";
import layoutDefault from "./dtStandartLayout.js";



const fn = document.getElementById('jsonFN').value;
// console.log("FN=" + fn);
const res = await fetch(checkOnUrl('admin/' + fn));
const dataJsonFile = await res.json();
// console.log(dataJsonFile)
//
const orderBy = [
    [0, 'asc'],
    // [1, 'asc']
];

export function reloadTable(e, dt, button, config) {
    dt.ajax.reload();
}

export const table = new DataTable('#defaultDataTable', {
    ajax: {
        url: checkOnUrl(document.location.href) + '&operation=initDefaultDataTable',
        type: 'POST',
        data: function(d) {
            const postData = {
                // statusID: 2,
                // orderID: document.querySelector('input#thisOrderID').value,
                // currencyValue: getCurrencyValue(),
                // tableID: document.querySelector('select#selectItemSource').value,
                // params: FilterParams(),
            }
            d.DATA = {
                //
                ...postData
                //
            };
        },
    },
    columns: dataJsonFile,
    serverSide: true,
    processing: true,
    ordering: true,
    order: orderBy,
    background: true,
    language: katzapskayaMova,
    // paging: true,
    pageLength: 8,
    searchDelay: 300,
    layout: layoutDefault,
    select:true,
    scrollX:true,
    autowidth:true,









});

standartEvents.tdBodyDtDblClick(table);

table.MakeCellsEditable({
    "onUpdate": myCallbackFunction,
    "inputCss":'form-control',
            "confirmationButton": { // could also be true
            "confirmCss": 'btn-link',
            "cancelCss": 'btn-link',
                    "inputTypes": [
            {
                "column": 4,
                "type": "number",
                "options": null
            },
            ]
        },
});


function myCallbackFunction(updatedCell, updatedRow, oldValue) {
    console.log("The new value for the cell is: " + updatedCell.data());
    console.log("The old value for that cell was: " + oldValue);
    console.log("The values for each cell in that row are: " , updatedRow.data());
}

// стилизуем поиск DT
// const inputSearch = document.querySelectorAll('div.dt-search input[type="search"]')[0];
// inputSearch.classList.add('w-50');