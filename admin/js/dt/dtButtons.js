// dtButtons.js

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
    text: 'PDF',
    className: 'text-danger',
    extend: 'pdfHtml5',
    filename: 'dtExport ' + formatNowToFileName(),
    pageSize: 'A4',
    orientation: 'landscape',
    margins: [20, 10, 10, 20],
    exportOptions: {
        columns: ':visible',
        modifier: {
            page: 'current'
        }
    }
};

export const btnExportExcel = {
    text: 'XLS',
    className: 'text-success',
    extend: 'excelHtml5',
    filename: 'dtExport ' + formatNowToFileName(),
    pageSize: 'A4',
    orientation: 'landscape',
    margins: [20, 10, 10, 20],
    exportOptions: {
        columns: ':visible',
        modifier: {
            page: 'current'
        }
    }
};

export const btnExportJSON = {
    text: 'JSON',
    action: function(e, dt, button, config) {
        var data = dt.buttons.exportData();
        DataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
    }
};

export const btnExportCSV = {
    text: 'CSV ;',
    fieldSeparator: ";",
    escapeChar: "&quot;",
    fieldBoundary: "'",
    newline: "\r\n",
    charset: "utf-8",
    className: 'text-dark',
    extend: 'csv',
    filename: 'dtExport ' + formatNowToFileName(),
    exportOptions: {
        columns: ':visible',
        modifier: {
            page: 'current'
        }
    }
}

export const btnExportsMenu = {
    text: 'Export',
    className: 'text-bg-light',
    extend: 'collection',
    buttons: [
        btnExportPDF,
        btnExportJSON,
        btnExportExcel,
        btnExportCSV,
        'csvHtml5',
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