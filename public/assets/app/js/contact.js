(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {
        $(document).on('submit', '#contact_form_submit', function (e) {
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var igreja = $('#igreja').val();
            var membros = $('#membros').val();
            var message = $('#message').val();
            var phone = $('#phone').val();

            if (name && email && message) {
                $.ajax({
                    type: "POST",
                    url: 'contact',
                    data: {
                        'name': name,
                        'email': email,
                        'subject': subject,
                        'igreja': igreja,
                        'membros': membros,
                        'message': message,
                        'phone': phone,
                    },
                    success: function (data) {
                        $('#contact_form_submit').children('.email-success').remove();
                        $('#contact_form_submit').prepend('<span class="alert alert-success email-success">' + data.msg + '</span>');
                        $('#name').val('');
                        $('#email').val('');
                        $('#message').val('');
                        $('#igreja').val('');
                        $('#subject').val('');
                        $('#phone').val('');
                        $('.email-success').fadeOut(6000);
                    },
                    error: function (res) {

                    }
                });
            } else {
                $('#contact_form_submit').children('.email-success').remove();
                $('#contact_form_submit').prepend('<span class="alert alert-danger email-success">Preencha os campos.</span>');
                $('.email-success').fadeOut(6000);
            }

        });
    })

}(jQuery));