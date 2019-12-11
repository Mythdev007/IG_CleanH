$.fn.dataTable.ext.buttons.reset = {
    className: 'buttons-reset', text: function (dt) {
        return '<i class="fa fa-undo"></i> ';
    }, action: function (e, dt, button, config) {

        dt.search('').draw();
        yadcf.exResetAllFilters(dt);

    }
};

$.fn.dataTable.ext.buttons.xmlAction = {
    className: 'buttons-xml-action',

    text: function (dt) {
        return dt.i18n('buttons.xmlAction', 'Xml');
    },

    action: function (e, dt, button, config) {
        var url = VAANCE_Datatable._buildUrl(dt, 'xmlAction');
        window.location = url;
    }
};

$.extend(true, jQuery.fn.dataTable.defaults, {
    // Global datatable settings

});
/***
 * Lots of help here
 * datetimepicker - https://github.com/mistic100/jQuery-QueryBuilder/issues/176
 */
/**
 * @type {{init: VAANCE_Datatable.init, newRelation: VAANCE_Datatable.newRelation, addSelected: VAANCE_Datatable.addSelected, linkRelation: VAANCE_Datatable.linkRelation, unlinkRelation: VAANCE_Datatable.unlinkRelation}}
 */
var VAANCE_Datatable = {

    init: function () {
        this.unlinkRelation();
        this.deleteRelation();
        this.linkRelation();
        this.addSelected();
        this.newRelation();
        this.quickCreare();
        this.quickEdit();
        this.quickShow();
        this.csvImport();

        this.queryBuilder();
        this.advancedViews();
        this.massAction();

    },

    _buildUrl: function (dt, action) {
        var url = dt.ajax.url() || '';
        var params = dt.ajax.params();
        params.action = action;

        if (url.indexOf('?') > -1) {
            return url + '&' + $.param(params);
        }

        return url + '?' + $.param(params);
    },

    massAction: function () {

        $(document).ready(function () {
            $('th.check_select').html('<input type="checkbox" name="check_all" id="checkbox_check_all" class="checkbox_check_all filled-in chk-col-green" value="1" /><label class="checkbox" for="checkbox_check_all"></label>');

            $('#index-mass-action').appendTo(".dt-buttons");
            $('#index-mass-action').show();

            $('select.select2').select2({
                theme: "bootstrap",
                width: '100%',
            });

            VAANCE_Datatable.massDelete();

        });

        $(document).on('click', '.checkbox_check_all', function (e) {

            $('.call-checkbox:checkbox').not(this).prop('checked', this.checked);

        });

        $(document).on("click", ".index-mass-update", function (e) {

            var r = confirm($.i18n._('are_you_sure'));

            if (r !== true) {
                return false;
            }

            e.preventDefault();

            var modal = $('#modal_mass_update');

            var _this = $(this);

            var massUpdate = [];

            $.each($("input[name='selection[]']:checked"), function () {
                massUpdate.push($(this).val());
            });

            if (massUpdate.length > 0) {

                modal.find('.modal-body').load(modal.attr('data-create-route'), function (result) {
                    modal.modal('toggle');
                    VAANCE_Common.initComponents();
                    $.AdminBSB.input.activate();
                    $("input[name='mass_action_ids']").val(massUpdate.join());

                });
            } else {
                VAANCE_Common.showNotification('bg-orange', $.i18n._('check_some_records'));
                return false;
            }

        });


    },

    massDelete: function () {

        $(document).on('click', '.index-mass-delete', function (e) { // This Works only for Index View

            var r = confirm($.i18n._('are_you_sure'));

            if (r !== true) {
                return false;
            }

            e.preventDefault();

            var massDelete = [];

            var href = $(this).attr('href');

            var forceDelete = $(this).attr('force-delete');

            $.each($("input[name='selection[]']:checked"), function () {

                massDelete.push($(this).val());

                var id = $(this).val();

                var url = href.replace('id', id);

                $.ajax({
                    type: "POST",
                    url: url + '?force_delete=' + forceDelete,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _method: 'delete',
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        entityCreateMode: 'ajax'
                    },
                    dataType: 'json',
                    success: function (result) {


                        if (result.type == 'error') {
                            VAANCE_Common.showNotification('bg-red', result.message);
                            return false;
                        }
                        if (result.action == 'refresh_datatable') {
                            VAANCE_Common.showNotification('bg-green', result.message);

                            var table = $('.dataTable').DataTable().ajax.reload();

                            return false;
                        }


                    }
                });

            });

            return false;
        });

    },

    advancedViewsComponents: function () {

        $('.advanced_views_select').on('select2:select', function (e) {
            console.log($(this).attr('related-table'));
            console.log(e.params.data.id);

            window.location = '?advView=' + e.params.data.id;

        });

        $('.advanced_views_settings').on('click', function (e) {

            e.preventDefault();

            var id = $(this).attr('data-id');
            var dataTableType = $(this).attr('data-table-type');
            var tableId = $(this).attr('table-id');
            var moduleName = $(this).attr('module-name');

            e.preventDefault();

            var modal = $('#advanced_filters_config_modal');

            modal.find('.modal-body').load('/core/extensions/advanced-view/get/' + id + '?dataTableType=' + dataTableType + '&tableId=' + tableId + '&mode=create&moduleName=' + moduleName, function (result) {

                modal.modal('show');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
                VAANCE_Datatable.advancedViewsComponents();

            });

        });

        $('#all_module_fileds option').dblclick(function (e) {
            e.preventDefault();
            $('select').moveToListAndDelete('#all_module_fileds', '#selected_fileds');
        });

        $('#adv-btn-right').click(function (e) {
            e.preventDefault();
            $('select').moveToListAndDelete('#all_module_fileds', '#selected_fileds');
        });

        $('#adv-btn-left').click(function (e) {
            e.preventDefault();
            $('select').moveToListAndDelete('#selected_fileds', '#all_module_fileds');
        });

        $('#selected_fileds option').dblclick(function (e) {
            e.preventDefault();
            $('select').moveToListAndDelete('#selected_fileds', '#all_module_fileds');
        });

        $('#adv-btn-up').click(function (e) {
            e.preventDefault();
            $('select').moveUpDown('#selected_fileds', true, false);
        });

        $('#adv-btn-down').click(function (e) {
            e.preventDefault();
            $('select').moveUpDown('#selected_fileds', false, true);
        });

    },

    /**
     * Advanced views
     */
    advancedViews: function () {

        VAANCE_Datatable.advancedViewsComponents();


        $(document).on('click', '.delete-list-view', function (e) {

            e.preventDefault();
            var id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: '/core/extensions/advanced-view/delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'id': id
                },
                dataType: 'json',
                success: function (result) {
                    if (result.action == 'show_message') {
                        if (result.type == 'success') {
                            VAANCE_Common.showNotification('bg-green', result.message);
                            location.reload();

                        }
                        if (result.type == 'error') {
                            VAANCE_Common.showNotification('bg-red', result.message);
                        }

                    }
                }
            });

        });

        $(document).on('click', '.edit-list-view', function (e) {

            e.preventDefault();

            var id = $(this).attr('data-id');
            var dataTableType = $(this).attr('data-table-type');
            var tableId = $(this).attr('table-id');

            e.preventDefault();

            var modal = $('#advanced_filters_config_modal');

            modal.find('.modal-body').load('/core/extensions/advanced-view/get/' + id + '?dataTableType=' + dataTableType + '&tableId=' + tableId, function (result) {

                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
                VAANCE_Datatable.advancedViewsComponents();

            });

        });

        $(document).on("submit", "#advanced_view_settings_form", function (e) {

            e.preventDefault();

            var _rules = $('#advanced_settings_filters_creator').queryBuilder('getRules');

            if (!$.isEmptyObject(_rules)) {

                var _json = JSON.stringify(_rules);

                $('#module_rules').val(_json);

            }

            var form = $(e.target);

            $('#selected_fileds option').each(function () {
                $(this).prop('selected', true);
            });

            var serializedValues = form.serialize();

            $.post(form.attr('action'), serializedValues, function (result) {

                if (result.action == 'show_message') {
                    if (result.type == 'success') {
                        VAANCE_Common.showNotification('bg-green', result.message);

                        $(form).parents('.modal').modal('toggle'); // close parent

                        location.reload();

                    }
                    if (result.type == 'error') {
                        VAANCE_Common.showNotification('bg-red', result.message);
                    }

                }

            });


        });


    },


    /**
     * Query builder
     */
    queryBuilder: function () {

        $('.btn-hide').on('click', function () {
            $(this).parent().hide();
        });
        $('.btn-show-filters').on('click', function () {
            var btn = $(this);

            var filters = $('#' + btn.attr('data-filter-id'));

            if (filters.is(":visible")) {
                filters.hide();
            } else {
                filters.show();
            }
        });
        $('.btn-get').on('click', function () {

            var tableIdentifier = $(this).parent().attr('data-table-id');

            var _rules = $(this).parent().queryBuilder('getRules');

            if (!$.isEmptyObject(_rules)) {

                var _json = JSON.stringify(_rules);

                var datatablesRequest = {rules: _json};

                var _table = $('#' + tableIdentifier).DataTable();

                _table.on('preXhr.dt', function (e, settings, data) {
                    $.each(datatablesRequest, function (k, v) {
                        data[k] = v;
                    });
                });

                _table.ajax.reload(null, false);

            } else {
                console.log("invalid object :");
            }

        });

        $('.btn-reset').on('click', function () {

            var tableIdentifier = $(this).parent().attr('data-table-id');

            var _table = $('#' + tableIdentifier).DataTable();
            _table.on('preXhr.dt', function (e, settings, data) {
                data['rules'] = '';
            });
            _table.ajax.reload();
            $(this).parent().queryBuilder('reset');
        });


    },

    csvImport: function () {

        $(document).on("click", ".records_import", function (e) {

            e.preventDefault();

            $('#modal_records_import').modal('toggle');

        });

    },

    quickCreare: function () {

        $(document).on("click", ".quick_create", function (e) {

            e.preventDefault();

            var modal = $('#modal_quick_create');

            modal.find('.modal-body').load(modal.attr('data-create-route'), function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();

            });

        });


    },

    tempTable: null,

    quickEdit: function () {

        // Quick Edit
        $(document).on("click", ".quick_edit", function (e) {

            e.preventDefault();

            VAANCE_Datatable.tempTable = $(this).parents('.related_module_wrapper').find('.linked-records').find('table').dataTable();

            var editUrl = $(this).attr('edit-url');

            var modal = $('#modal_quick_edit');

            modal.find('.modal-body').load(editUrl, function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
            });

        });

        $(document).on("submit", ".update-related-modal-form", function (e) {

            e.preventDefault();

            var form = $(e.target);

            var formData = new FormData(form[0]);

            if (form.valid()) {

                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (result) {

                        $(form).parents('.modal').modal('toggle'); // close parent

                        if (result.action == 'refresh_datatable') {

                            VAANCE_Common.showNotification('bg-green', result.message);

                            var linkedDataTable = VAANCE_Datatable.tempTable;
                            linkedDataTable.DataTable().ajax.reload();

                            if (window.LaravelDataTables["dataTableBuilder"] != '') {
                                $("#dataTableBuilder").DataTable().ajax.reload();
                            }
                        }

                        if (result.action == 'show_message') {
                            VAANCE_Common.showNotification('bg-red', result.message);
                        }

                    }
                });

            } else {
                return false;
            }

        });

    },

    quickShow: function () {

        // Quick Edit
        $(document).on("click", ".quick_show", function (e) {

            e.preventDefault();

            VAANCE_Datatable.tempTable = $(this).parents('.related_module_wrapper').find('.linked-records').find('table').dataTable();

            var showUrl = $(this).attr('show-url');

            var modal = $('#modal_quick_show');

            modal.find('.modal-body').load(showUrl, function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();
            });

        });

    },


    /**
     * 1. Show create form
     * 2. Post create form data
     * 3. Refresh linked datatable
     */
    newRelation: function () {

        $(document).on("click", ".modal-new-relation", function (e) {

            e.preventDefault();

            var modal = $(this).parent().find('.modal');

            modal.find('.modal-body').load(modal.attr('data-create-route'), function (result) {
                modal.modal('toggle');
                VAANCE_Common.initComponents();
                $.AdminBSB.input.activate();

            });

        });

        $(document).on("submit", ".related-modal-form", function (e) {

            e.preventDefault();

            var form = $(e.target);

            if (form.valid()) {

                var formData = new FormData(form[0]);

                $.ajax({
                    type: "POST",
                    url: form.attr('action'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (result) {

                        $(form).parents('.modal').modal('toggle'); // close parent

                        if (result.action == 'refresh_datatable') {

                            VAANCE_Common.showNotification('bg-green', result.message);

                            var linkedDataTable = $(form).parents('.related_module_wrapper').find('.linked-records').find('table').dataTable();
                            linkedDataTable.DataTable().ajax.reload();

                            if (window.LaravelDataTables["dataTableBuilder"] != '') {
                                $("#dataTableBuilder").DataTable().ajax.reload();
                            }
                        }

                        if (result.action == 'show_message') {
                            VAANCE_Common.showNotification('bg-red', result.message);
                        }

                    }
                });
            } else {
                return false;
            }

        });
    },

    /**
     * Add selected to relation
     */
    addSelected: function () {

        $(document).on("submit", ".link-selected", function (e) {
            e.preventDefault();

            var form = $(e.target);

            var modalTableName = $(form).find('input[name=modalName]');
            var modalDataTable = $($('#' + modalTableName.val()).find('table').first()).dataTable();

            var checkedElements = [];

            var rowcollection = modalDataTable.$(".call-checkbox:checked", {"page": "all"});

            rowcollection.each(function (index, elem) {
                checkedElements.push($(elem).val());
            });

            $(form).find('input[name=relationEntityIds]').val(JSON.stringify(checkedElements));

            $.post(form.attr('action'), form.serialize(), function (result) {

                if (result.action == 'refresh_datatable') {

                    VAANCE_Common.showNotification('bg-green', result.message);

                    // DataTable in modal popup
                    modalDataTable.DataTable().ajax.reload();

                    // Refresh linked datatable
                    var linkedTableName = $(form).find('input[name=linkedName]');
                    var linkedDataTable = $($('#' + linkedTableName.val()).find('table').first()).dataTable();
                    linkedDataTable.DataTable().ajax.reload();

                }
                if (result.action == 'show_message') {

                    VAANCE_Common.showNotification('bg-red', result.message);

                }

                $('#' + modalTableName.val()).modal('toggle');

            });
        });
    },

    defferTable: function () {

    },

    /**
     * Link Relation Modal
     */
    linkRelation: function () {


        $(document).on("click", ".modal-relation", function (e) {

            e.preventDefault();

            var modal = $(this).parent().find('.modal');

            modal.modal('toggle');
        });

    },

    /**
     * Unlink Relation
     */
    unlinkRelation: function () {

        $(document).on("submit", ".unlink-relation", function (e) {
            e.preventDefault();

            var form = $(e.target);

            $.post(form.attr('action'), form.serialize(), function (result) {

                if (result.action === 'refresh_datatable') {

                    VAANCE_Common.showNotification('bg-green', result.message);

                    var table = form.closest('table').DataTable().ajax.reload();
                }
                if (result.action === 'show_message') {
                    alert(result.message);

                    VAANCE_Common.showNotification('bg-red', result.message);
                }

            });
        });

    },

    deleteRelation: function () {

        $(document).on("submit", ".delete-relation", function (e) {
            e.preventDefault();

            var form = $(e.target);

            $.post(form.attr('action'), form.serialize(), function (result) {

                if (result.action == 'refresh_datatable') {

                    VAANCE_Common.showNotification('bg-green', result.message);

                    var table = form.closest('table').DataTable().ajax.reload();
                }
                if (result.action == 'show_message') {
                    alert(result.message);

                    VAANCE_Common.showNotification('bg-red', result.message);
                }

            });
        });

    },


    headerFilterReset: function (datatable) {
        yadcf.exResetAllFilters($("#" + datatable).DataTable());
        return false;
    },
    headerFilterSet: function (filterColumnName, datatable, filterValue) {

        /**
         * Help Information
         * filterColumn name is defined in Datatable of module.
         * Example TicketDatatable->availableColumns->owner->column_name
         *
         * @type {*|jQuery}
         */

        var foundColumn = $("#" + datatable).DataTable().settings().init().columns.filter(function (element) {
            return element.column_name == filterColumnName;
        });

        if (foundColumn[0] != null) {
            yadcf.exFilterColumn($("#" + datatable).DataTable(), [[foundColumn[0].column_number, filterValue]]);
            $("#" + datatable).DataTable().ajax.reload(null, false);
        }

        return false;
    }
};

VAANCE_Datatable.init();


