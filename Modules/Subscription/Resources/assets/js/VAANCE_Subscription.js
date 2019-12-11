var VAANCE_Subscription = {

    _plan_name: '',
    _plan_description: '',
    _plan_currency: '',
    _plan_gateway: '',

    init: function () {

    },

    setupPaymentForm: function (btnElement) {

        VAANCE_Subscription._plan_name = $(btnElement).attr('data-name');
        VAANCE_Subscription._plan_description = $(btnElement).attr('data-desc');
        VAANCE_Subscription._plan_currency = $(btnElement).attr('data-currency');
        VAANCE_Subscription._plan_gateway = $(btnElement).attr('data-gateway');


        $('#payment_form_name').val(VAANCE_Subscription._plan_name);
        $('#payment_form_desc').val(VAANCE_Subscription._plan_description);
        $('#payment_form_currency').val(VAANCE_Subscription._plan_currency);
        $('#payment_form_gateway').val(VAANCE_Subscription._plan_gateway);
    },

    brainTreeSetup: function (token) {

        braintree.setup(token, 'dropin', {
            container: 'dropin-container',
            onReady: function () {

            },

        });

        $('.change-plan').click(function (e) {

            $('#payment-form').show();

            var btnElement = $(this);

            VAANCE_Subscription.setupPaymentForm(btnElement);

            e.preventDefault();

        });

    },

    stripeSetup: function (stripeKey, email) {

        var handler = StripeCheckout.configure({
            key: stripeKey,
            locale: 'auto',
            token: function (token) {
                var form = $('#payment-form');

                $(form).prop('disabled', true);

                $('<input>').attr({
                    type: 'hidden',
                    name: 'token',
                    value: token.id
                }).appendTo(form);

                form.submit();
            }
        });

        $('.change-plan').click(function (e) {

            var btnElement = $(this);

            VAANCE_Subscription.setupPaymentForm(btnElement);

            handler.open({
                name: VAANCE_Subscription._plan_name,
                description: VAANCE_Subscription._plan_description,
                currency: VAANCE_Subscription._plan_currency,
                key: stripeKey,
                email: email
            });

            e.preventDefault();

        });

    },


};

VAANCE_Subscription.init();
