$(function() {
    $("#login-form").on( "submit", function(e) {
        e.preventDefault();
        e.stopPropagation();

        if ($.trim($('#email').val()).length === 0 || $.trim($('#password').val()).length === 0){
            return false;
        }

        $.ajax({
            type: "POST",
            url: '/login',
            data: $(this).serialize(),
            dataType: "json",
            success: function(response){
                if (response && response.id !== 0) {
                    setCookie('is_logged',true,1);
                    setCookie('user_name',response.first_name + " " + response.last_name,1);

                    location.href = '/';
                } else {
                    $("#errors").append("<div>Invalid e-mail address or password</div>")
                    $("#errors").fadeIn("slow")
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }
});