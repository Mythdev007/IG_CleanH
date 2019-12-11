var VAANCE_GeneralSettings = {

    init: function () {

        this.onSendTestEmail();

    },


    /**
     *
     */
    onSendTestEmail: function () {

        $(document).on('click', '#send_test_email', function () {
            $('#sendTestEmail').modal('toggle');
        });

        $(document).on('submit', '#send_test_email_form', function (e) {
            e.preventDefault();

            var data = $('#send_test_email_form').serializeObject();

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'email': data.email,
                    '_token': data.token,
                    'message': data.message
                },
                dataType: 'json',
                success: function (result) {

                    if (result.type == 'error') {
                        VAANCE_Common.showNotification('bg-red', result.message);

                        return false;
                    }
                    if (result.action == 'refresh') {
                        VAANCE_Common.showNotification('bg-green', result.message);

                        $('#sendTestEmail').modal('toggle');

                        return false;
                    }
                }
            });
        });

    }

}

VAANCE_GeneralSettings.init();
