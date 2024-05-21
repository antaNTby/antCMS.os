// dtEvents.js

export const tdBodyDtDblClick = (table) => {
    table.on('dblclick', 'tbody td', function() {
        // let data = table.cell(this).render('display');
        let data = table.cell(this).render('filter');
        console.info(data);
    });
};