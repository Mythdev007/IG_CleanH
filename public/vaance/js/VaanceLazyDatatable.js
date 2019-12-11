var BAPLazyDatatable = {

    init: function () {

        var hash = document.URL.substr(document.URL.indexOf('#')+1);

        if(hash != '') {

            var a = $('a[data-id="'+hash+'"]');

            if(a != ''){
                var relatedTable = $(a).attr('data-table-related');

                if(!!relatedTable){
                    $('#'+relatedTable).DataTable().ajax.reload();
                }
                var newTable = $(a).attr('data-table-new');

                if(!!newTable){
                    $('#'+newTable).DataTable().ajax.reload();
                }
            }
        }

        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {

            var relatedTable = $(this).attr('data-table-related');

            if(!!relatedTable){
                $('#'+relatedTable).DataTable().ajax.reload();
            }
            var newTable = $(this).attr('data-table-new');

            if(!!newTable){
                $('#'+newTable).DataTable().ajax.reload();
            }

        });

    }

};

BAPLazyDatatable.init();
