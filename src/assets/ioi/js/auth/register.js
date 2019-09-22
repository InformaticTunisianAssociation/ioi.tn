$(function () {

    $('#register #btn-register').click(function (event) {
        register();
    });
});

function register() {
    var formData = {
        'firstname': $('#register input[name=firstname]').val(),
        'lastname': $('#register input[name=lastname]').val(),
        'username': $('#register input[name=username]').val(),
        'email': $('#register input[name=email]').val(),
        'password': $('#register input[name=password]').val(),
        'date_birth': $('#register input[name=date_birth]').val(),
        'phone': $('#register input[name=phone]').val(),
        'register_next_contest' : $('#register input[name=register_next_contest]').is(":checked")
    };

    // process the form
    $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: '/auth/do_register', // the url where we want to POST
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true
    })
        // using the done promise callback
        .done(function (data) {

            // log data to the console so we can see
            //console.log(data);
            //console.log(data);
            if (data.error == null) {
                window.location.replace(data.redirect_link);
            }
            else {
                $('#register-error').addClass("alert");
                $('#register-error').addClass("alert-danger");
                $('#register-error').html(data.error);
                window.scrollTo(0, 0);
            }

        });
}