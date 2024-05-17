// dtButtons.js

var docDefinition = {
    // a string or { width: number, height: number }
    pageSize: 'A4',

    // by default we use portrait, you can change it to landscape if you wish
    pageOrientation: 'landscape',

    // [left, top, right, bottom] or [horizontal, vertical] or just a number for equal margins
    pageMargins: [20, 10, 10, 20],
};


export const btnColVis = {
    text: 'Показать столбцы',
    className: 'text-bg-danger',
    extend: 'colvis',
    // columns: 'th:nth-child(n+2)',
    columnText: function(dt, idx, title) {
        return idx + 1 + ' ' + title;
    }
};

export const btnExportPDF = {
    text: 'PDF-file',
    className: 'text-danger',
    extend: 'pdfHtml5',
    customize: function(doc) {
        console.info(doc)
        doc={...docDefinition};
        console.log(doc)
        return doc;
    }
};

export const dropExport = {
    text: 'Export',
    className: 'text-bg-light',
    extend: 'collection',
    buttons: [


        btnExportPDF,
        // 'csv',
        // 'excel',
        // 'pdf',
        'csvHtml5',
        'excelHtml5',
        'pdfHtml5',


    ]

};

const standartButtons = [
    //
    {
        text: 'Select filter applied - object',
        extend: 'selectAll',
        selectorModifier: {
            search: 'applied'
        },
    },
    //
    {
        text: 'Select current page - function',
        extend: 'selectAll',
        selectorModifier: function() {
            return {
                page: 'current'
            };
        }
    },
    //
    'selectNone',
    //
    {
        extend: 'collection',
        text: 'Export',
        buttons: ['csv', 'excel', 'pdf']
    }


];

const otherButtons = [
    'csv',
    //
    {
        extend: 'collection',
        text: 'Show columns',
        buttons: ['columnsVisibility'],
        visibility: true
    },
    //
    {
        extend: 'collection',
        text: 'Hide columns',
        buttons: ['columnsVisibility'],
        visibility: false
    },
    //
    {
        extend: 'colvis',
        columnText: function(dt, idx, title) {
            return idx + 1 + ': ' + title;
        }
    }
];


export default standartButtons