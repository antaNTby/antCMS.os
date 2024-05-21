// dtButtons.js
import {btnColVis} from "./dtButtons.js";
import {btnExportsMenu} from "./dtButtons.js";
// import {btnExportJSON} from "./dtButtons.js";
import myButtons from "./dtButtons.js";

// console.log(btnExportsMenu)


const layoutDefault = {

    top4: function() {
        let toolbar = document.createElement('div');
        toolbar.innerHTML = '<b>Custom tool bar! Text/images etc.</b>';

        return toolbar;
    },
    // top4Start: {
    //     pageLength: {
    //         menu: [
    //             [16 / 4, 16 / 2, 16, 16 * 2, 16 * 4, 16 * 8, 16 * 16], //
    //             [16 / 4 + ` строки/стр`, 16 / 2 + ` строк/стр`, 16 + ` строк/стр`, 16 * 2 + ` строки/стр`, 16 * 4 + ` строки/стр`, 16 * 8 + ` строк/стр`, 16 * 16 + ` строк/стр`] //
    //         ],
    //     },
    // },
    // top4End: {
    //     paging: {
    //         // numbers: 3
    //         type: 'first_last_numbers',
    //         boundaryNumbers: true,
    //     }
    // },
    //
    top3: null,
    top3Start: null,
    top3End: null,
    //
    // top2: {
    //     buttons: myButtons,
    // },
    top2:null,
    top2Start: null,
    top2End: null,
    //
    top: {
        buttons: [btnColVis,btnExportsMenu]
    },

    topStart: "info",

    topEnd: {
        search: {
            placeholder: 'Поиск по таблице',
            return: true,
        },
    },
    //
    // DataTable
    //

    bottom: null,
    bottomStart: {
        pageLength: {
            menu: [
                [16 / 4, 16 / 2, 16, 16 * 2, 16 * 4, 16 * 8, 16 * 16], //
                [16 / 4 + ` строки/стр`, 16 / 2 + ` строк/стр`, 16 + ` строк/стр`, 16 * 2 + ` строки/стр`, 16 * 4 + ` строки/стр`, 16 * 8 + ` строк/стр`, 16 * 16 + ` строк/стр`] //
            ],
        },
    },
    bottomEnd: {
        paging: {
            // numbers: 3
            type: 'first_last_numbers',
            boundaryNumbers: true,
        }
    },
    //
    bottom2: {
        buttons: myButtons,
    },
    bottom2Start: null,
    bottom2End: null,

}

export default layoutDefault


// {
//     topStart: 'pageLength',
//     topEnd: 'search',
//     bottomStart: 'info',
//     bottomEnd: 'paging'
// }
//

/*

topN
topNStart   topNEnd
⋮
top2
top2Start   top2End
top
topStart    topEnd
DataTable
bottom
bottomStart     bottomEnd
bottom2
bottom2Start    bottom2End
⋮
bottomN
bottomNStart    bottomNEnd


*/