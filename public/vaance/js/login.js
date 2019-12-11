VAANCE_Login = {

    init: function () {

        $('#userAdmin').on('click', function () {
            $('#name').val('admin@laravel-vaance.com');
            $('#password').val('admin');
        });
        $('#userCompany1').on('click', function () {
            $('#name').val('norman@laravel-vaance.com');
            $('#password').val('admin');
        });
        $('#userCompany2').on('click', function () {
            $('#name').val('wesker@laravel-vaance.com');
            $('#password').val('admin');
        });

        $('#sign_up').on('submit', function(ev) {
            $('#signupModal').modal('show');
        });


    }

}

VAANCE_Login.init();