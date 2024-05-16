// dtButtons.js
import myButtons from "./dtButtons.js";

console.log(myButtons)


const layoutDefault = {

    top3Start: {
        buttons: ['create', 'edit', 'remove']
    },

    top3End: {
        buttons: ['excel', 'csv']
    },

    top2Start: function() {
        let toolbar = document.createElement('div');
        toolbar.innerHTML = '<b>Custom tool bar! Text/images etc.</b>';

        return toolbar;
    },

    top2End: {
        buttons: myButtons,
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

    bottom2: {
        search: {
            placeholder: 'Поиск по таблице',
            return: true
        },
    },
}
export default layoutDefault