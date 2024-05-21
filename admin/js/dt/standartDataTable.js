import * as bsToast from '../../apps/Toasts/appToasts.js';
import katzapskayaMova from './defaultKatzapskayaMova.js';
import * as standartEvents from './dtEvents.js';
import layoutDefault from './dtStandartLayout.js';
const fn = document.getElementById('jsonFN').value;
// console.log('FN=' + fn);
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
    scrollX: true,
    autowidth: true,
    // select: true,
});

//
//
//

// standartEvents.tdBodyDtDblClick(table);


table.MakeCellsEditable(
    //
    {
        "onUpdate": dtDefaultCallbackFunction,
        "inputCss": "bg-warning-subtle",
        // "columns": dataJsonFile,
        "allowNulls": {
            "columns": [3],
            "errorClass": "error"
        },
        // "confirmationButton": true,
        // "confirmAll": false,
        "listenToKeys": true,
        // could also be true
        // "confirmationButton": { // could also be true
        //     "confirmCss": "btn btn-sm btn-primary float-start mt-1",
        //     "cancelCss": "btn btn-sm btn-danger float-end mt-1",
        // },
        confirmationButton: true,
        "inputTypes": [
            //
            {
                "column": 0,
                "type": false,
            },

            {
                "column": 4,
                "type": "number",
                "options": null
            },
            //
            {
                "column": 1,
                "type": "list-noconfirm",
                "options": [{
                    "value": "1",
                    "display": "Beaty"
                }, {
                    "value": "2",
                    "display": "Doe"
                }, {
                    "value": "3",
                    "display": "Dirt"
                }]
            },
            {
                "column": 2,
                "type": "list",
                "options": [{
                    "value": "1",
                    "display": "Beaty"
                }, {
                    "value": "2",
                    "display": "Doe"
                }, {
                    "value": "3",
                    "display": "Dirt"
                }, {
                    "value": "4",
                    "display": "Beaty"
                }, {
                    "value": "5",
                    "display": "Doe"
                }, {
                    "value": "6",
                    "display": "Dirt"
                }]
            },
            //
            {
                "column": 3,
                "type": "text-confirm",
                "options": null
            },
            {
                "column": 5,
                "type": "textarea-confirm",
                "options": null
            },
        ]
    }
    //
);

function dtDefaultCallbackFunction(updatedCell, updatedRow, oldValue) {
    // console.log('The new value for the cell is: ' + updatedCell.data());
    // console.log('The old value for that cell was: ' + oldValue);
    console.log('The values for each cell in that row are: ', updatedRow.data());
}
// стилизуем поиск DT
// const inputSearch = document.querySelectorAll('div.dt-search input[type='search']')[0];
// inputSearch.classList.add('w-50');


function destroyTable() {
    if ($.fn.DataTable.isDataTable('#defaultDataTable')) {
        table.destroy();
        table.MakeCellsEditable("destroy");
    }
}