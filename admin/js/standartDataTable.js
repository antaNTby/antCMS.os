const fn = document.getElementById('jsonFN').value;
console.log("FN=" + fn);

const res = await fetch(checkOnUrl('admin/'+fn));
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