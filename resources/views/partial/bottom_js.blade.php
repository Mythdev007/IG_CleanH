
<!-- Scripts -->
{!! Packer::js([
    '/vaance/plugins/js-storage/js.storage.min.js',
    '/vaance/plugins/jquery/jquery.min.js',
    '/vaance/plugins/jquery.i18n.js',
    '/vaance/js/trans/'.app()->getLocale().'.js',

    '/vaance/plugins/bootstrap/js/bootstrap.js',
    '/vaance/plugins/bootstrap-select/js/bootstrap-select.js',
    '/vaance/plugins/select2-4.0.3/dist/js/select2.full.min.js',
    '/vaance/plugins/jquery-slimscroll/jquery.slimscroll.js',
    '/vaance/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js',
    '/vaance/plugins/node-waves/waves.js',
    '/vaance/plugins/bootstrap-notify/bootstrap-notify.js',
    '/vaance/plugins/jquery.number.min.js',
    '/vaance/plugins/jquery-datatable/jquery.dataTables.js',
    '/vaance/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js',
    '/vaance/plugins/jquery-datatable/extensions/responsive/js/dataTables.responsive.js',
    '/vaance/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js',
    '/vaance/plugins/jquery-datatable/extensions/export/buttons.html5.min.js',
    '/vaance/plugins/jquery-datatable/extensions/export/buttons.print.min.js',
    '/vendor/datatables/buttons.server-side.js',
    '/vaance/plugins/jquery-datatable/extensions/export/jszip.min.js',
    '/vaance/plugins/jquery-datatable/extensions/export/pdfmake.min.js',

    '/vaance/plugins/offlinejs/offline.min.js',
    '/vaance/plugins/bootstrap-fileinput/js/fileinput.min.js',
    '/vaance/plugins/momentjs/moment.js',
    '/vaance/plugins/bootstrap-fileinput/js/locales/'.app()->getLocale().'.js',
    '/vaance/plugins/momentjs/locale/'.app()->getLocale().'.js',
    '/vaance/plugins/bootstrap-daterangepicker/daterangepicker.js',
    '/vaance/plugins/jquery-countto/jquery.countTo.js',
    '/vaance/plugins/bootstrap-datetimepicker/dist/js/bootstrap-datetimepicker.min.js',
    '/vaance/plugins/jquery-comments/js/jquery.textcomplete.min.js',
    '/vaance/plugins/jquery-comments/js/jquery-comments.min.js',
    '/vaance/plugins/jquert-query-builder/js/query-builder.standalone.js',
    '/vaance/plugins/js.cookie.js',
    '/vaance/js/VaanceConfig.js',
    '/vaance/js/VaanceDatatable.js',
    '/vaance/js/VaancePlatform.js',
    '/vaance/plugins/jquery-datatable/yadcf/jquery.dataTables.yadcf.js',
    '/vaance/plugins/jquery-jscroll/jquery.jscroll.min.js',
    '/vaance/plugins/select-list-action/jquery.selectlistactions.js',
    '/vaance/plugins/bootstrap-tagsinput/typeahead.bundle.js',
    '/vaance/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js',
    '/vaance/plugins/summernote/summernote.min.js',
    '/vaance/js/admin.js',
    '/vaance/js/VaanceCollapsiblePanel.js',
    '/vaance/js/Common.js',

    '/modules/notifications/js/VAANCE_Notifications.js'
    ],
    '/storage/cache/js/'
) !!}

<script type="text/javascript" src="{{ asset('vaance/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

