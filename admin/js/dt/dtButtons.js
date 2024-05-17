// dtButtons.js
//
export const btnColVis = {
    text: 'Показать столбцы',
    className: 'text-bg-danger',
    extend: 'colvis',
    // columns: 'th:nth-child(n+2)',
    columnText: function(dt, idx, title) {
        return idx + 1 + ' ' + title;
    }
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