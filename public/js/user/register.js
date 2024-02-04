$(function() {
    $("#register-form").on( "submit", function( e ) {
        e.preventDefault();
        e.stopPropagation();

        clear();

        if (!validateRegistrationForm()){
            $("#errors").fadeIn("slow")
            return false;
        }

        $.ajax({
            type: "POST",
            url: '/register',
            data: $(this).serialize(),
            dataType: "json",
            success: function(response){
                if (response === 0){
                    $("#errors").append("<div>The email address is already in use</div>")
                    $("#errors").fadeIn("slow")
                } else {
                    $("#message").append("<div>Successful registration. You'll be redirected to 'Login page' after 5 seconds</div>")
                    $("#message").fadeIn("slow")

                    setTimeout(function(){ window.location = '/login'; }, 5000);
                }
            },
            error: function(){
                //error code here
            }
        });
    });

    function validateRegistrationForm(){
        let isFormValid = true;

        if ($.trim($('#first-name').val()).length === 0){
            $("#errors").append("<div>'First name' is required field</div>");

            $('#first-name').css('border-color', 'red');
            $('#first-name').css('background-color', '#fce3e1');

            isFormValid = false;
        }

        if ($.trim($('#last-name').val()).length === 0){
            $("#errors").append("<div>'Last name' is required field</div>");

            $('#last-name').css('border-color', 'red');
            $('#last-name').css('background-color', '#fce3e1');

            isFormValid = false;
        }

        if ($.trim($('#password').val()).length === 0){
            $("#errors").append("<div>'Password' is required field</div>");

            $('#password').css('border-color', 'red');
            $('#password').css('background-color', '#fce3e1');

            isFormValid = false;
        } else if ($('#password').val().length < 8) {
            $("#errors").append("<div>Password must be at least 8 characters</div>");

            $('#password').css('border-color', 'red');
            $('#repeat-password').css('border-color', 'red');

            isFormValid = false;
        }

        if($.trim($('#repeat-password').val()).length === 0){
            $("#errors").append("<div>'Repeat password' is required field</div>");

            $('#repeat-password').css('border-color', 'red');
            $('#repeat-password').css('background-color', '#fce3e1');

            isFormValid = false;
        }

        if ($('#password').val() !== $('#repeat-password').val()){
            $("#errors").append("<div>Passwords not match</div>");

            $('#password').css('border-color', 'red');
            $('#password').css('background-color', '#fce3e1');
            $('#repeat-password').css('border-color', 'red');
            $('#repeat-password').css('background-color', '#fce3e1');

            isFormValid = false;
        }

        if ($.trim($('#email').val()).length === 0){
            $("#errors").append("<div>'E-mail' is required field</div>");

            $('#email').css('border-color', 'red');
            $('#email').css('background-color', '#fce3e1');

            isFormValid = false;
        } else if (!validateEmail($('#email').val())){
            $("#errors").append("<div>Invalid e-mail address</div>");

            $('#email').css('border-color', 'red');
            $('#email').css('background-color', '#fce3e1');

            isFormValid = false;
        }

        return isFormValid;
    }

    function validateEmail(email) {
        return email.match(/^\S+@\S+\.\S+$/);
    }

    function clear(){
        $("#errors").fadeOut("slow")
        $("#errors").html("");

        $('#first-name').css('border-color', '#3385ff');
        $('#first-name').css('background-color', '#e6f5ff');

        $('#last-name').css('border-color', '#3385ff');
        $('#last-name').css('background-color', '#e6f5ff');

        $('#password').css('border-color', '#3385ff');
        $('#password').css('background-color', '#e6f5ff');

        $('#repeat-password').css('border-color', '#3385ff');
        $('#repeat-password').css('background-color', '#e6f5ff');

        $('#email').css('border-color', '#3385ff');
        $('#email').css('background-color', '#e6f5ff');
    }
});