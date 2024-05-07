// standartDataTable.js
//


const app = function() {

    const selector = "table#exmple";
    const FilterParams = () => {
        let filter = {};
        // filter.searchstring = document.querySelector('input#app_searchstring').value.toString();
        // filter.isFullTextSearch = +document.querySelector('input#isFullTextSearch').checked;
        return filter;
    };

    // const table = new DataTable(

    //     '#xxxDataTable',

    //     {


    //         // ajax: {
    //         //     url: checkOnUrl(document.location.href) + '&DataTable=getShortCompaniesData' + '&app=app_admincompanies',
    //         //     type: 'POST',
    //         //     data: function(d) {
    //         //         const postData = {
    //         //             params: FilterParams(),
    //         //         }
    //         //         d.DATA = {
    //         //             //
    //         //             ...postData
    //         //             //
    //         //         };
    //         //     },
    //         // },
    //         // serverSide: true,
    //         processing: true,
    //         searchDelay: 300,
    //         search: {
    //             return: true
    //         },
    //         ordering: true,
    //         order: order_array,
    //         background: true,
    //         info: false,
    //         ordering: false,
    //         paging: false
    //     }

    // );



}


window.onload = app();
export default app