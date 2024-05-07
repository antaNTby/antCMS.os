const jsonColumns = [{
    "index": 0,
    "data": "orderID",
    "db": "orderID",
    "dt": "orderID",
    "title": "title orderID",
    "orderable": true,
    "visible": true,
    "searchable": true,
    "formatter": null
}, {
    "index": 1,
    "data": "customerID",
    "db": "customerID",
    "dt": "customerID",
    "title": "title customerID",
    "orderable": true,
    "visible": true,
    "searchable": true,
    "formatter": null
}, {
    "index": 2,
    "data": "order_time",
    "db": "order_time",
    "dt": "order_time",
    "title": "title order_time",
    "orderable": true,
    "visible": true,
    "searchable": true,
    "formatter": null
}, {
    "index": 3,
    "data": "order_amount",
    "db": "order_amount",
    "dt": "order_amount",
    "title": "title order_amount",
    "orderable": true,
    "visible": true,
    "searchable": true,
    "formatter": null
}, {
    "index": 4,
    "data": "admin_comment",
    "db": "admin_comment",
    "dt": "admin_comment",
    "title": "title admin_comment",
    "orderable": true,
    "visible": true,
    "searchable": true,
    "formatter": null
}];



const res = await fetch(checkOnUrl('admin/tpl/sub/trade_orders__columns.json'));
const dataJsonFile = await res.json();
// console.log(dataJsonFile)











export const sdt = new DataTable('#example',

    {

        ajax: {
            url: checkOnUrl(document.location.href) + '&operation=getDataTableData' + '&app=app_admin_products',
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
        searchDelay: 300,
        search: {
            return: true
        },
        ordering: true,


    }









);