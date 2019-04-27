/* ------------------------------------------------------------------------------
 *
 *  # Responsive extension for Datatables
 *
 *  Demo JS code for datatable_responsive.html page
 *
 * ---------------------------------------------------------------------------- */

// Setup module
var DatatableResponsive = function () {
    // Setup module components    
    function filterGlobal() {
        $('#DataTables_Table_3').DataTable().search(
            $("#global_filter").val(),
        ).draw();
    }

    // Basic Datatable examples
    var _componentDatatableResponsive = function () {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }
 
        $('.dt-search-filter').on('click', function () {
            $('input.global_filter').toggle('');
        });

        $('input.global_filter').on('keyup', function () {
            filterGlobal();
        });


        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            info: false,           
            responsive: true,
            columnDefs: [{
                orderable: false,
                width: 100,              
            }],
            dom: '<"datatable-header"><"datatable-scroll-wrap"t><"datatable-footer"fl,ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });
  
        // Whole row as a control
        $('.datatable-responsive-row-control').DataTable({
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0
                },
                {
                    width: "100px",
                  //  targets: [6]
                },
                {
                    orderable: false,
                  //  targets: [6]
                }
            ],
            order: [1, 'asc']
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function () {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };  
 
    // Return objects assigned to module
    return {
        init: function () {
            _componentDatatableResponsive();
            _componentSelect2();
        }
    }
}();

// Initialize module
document.addEventListener('DOMContentLoaded', function () {
    DatatableResponsive.init();
});
