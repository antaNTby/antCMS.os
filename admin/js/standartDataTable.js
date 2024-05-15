import KatzapskayaMova from "../js/lang/defaultKatzapskayaMova.js";
import * as bsToast from "../apps/Toasts/appToasts.js";


const fn = document.getElementById('jsonFN').value;
console.log("FN=" + fn);
const res = await fetch(checkOnUrl('admin/' + fn));
const dataJsonFile = await res.json();
// console.log(dataJsonFile)
const ORDER_ARRAY = [
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
    order: ORDER_ARRAY,
    // background: true,
    language: KatzapskayaMova,
    // paging: true,
    pageLength: 8,
    searchDelay: 300,
    layout: {

        top2Start: function () {
            let toolbar = document.createElement('div');
            toolbar.innerHTML = '<b>Custom tool bar! Text/images etc.</b>';

            return toolbar;
        },
        top2End: {
            buttons: [
                'copy', 'excel'
            ]
        },

        topStart: {
            pageLength: {
                menu: [
                    [16 / 4, 16 / 2, 16, 16 * 2, 16 * 4, 16 * 8, 16 * 16], //
                    [16 / 4 + ` строки/стр`, 16 / 2 + ` строк/стр`, 16 + ` строк/стр`, 16 * 2 + ` строки/стр`, 16 * 4 + ` строки/стр`, 16 * 8 + ` строк/стр`, 16 * 16 + ` строк/стр`] //
                ],
            }
        },
        topEnd: {
            search: {
                placeholder: 'Поиск по таблице',
                return: true
            },
        },
        bottomEnd: {
            paging: {
                numbers: 3
            }
        },
    }









});
