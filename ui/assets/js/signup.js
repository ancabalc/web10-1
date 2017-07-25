$(document).ready(function() {
    
    $("#btn-submit").click(function(e) {
        e.preventDefault();
    	var name        = $("#user_name").val();
    	var email       = $("#user_email").val();
    	var password    = $("#password").val();
    	var repassword  = $("#cpassword").val();
    	var role        = $('input[type="radio"][name="role"]:checked').val();
    	
        if (name == '' || email == '' || password == '' || repassword == '') {
    	    alert("Please fill in all fields!");
        } else if (!$('input[type="radio"][name="role"]:checked').val() ) {          
            alert("Please choose account type!");
        } else if ((password.length) < 6) {
    	    alert("Password must have at least 6 characters!");
        } else if (!(password).match(repassword)) {
    	    alert("Your passwords don't match. Please retry!");
        } else {
            $.ajax({
                type        : 'POST',
                url         : 'https://web10-1-adrianvarga77.c9users.io/api/accounts/create',
                data        : {
                    name        : name,
                    email       : email,
                    password    : password,
                    repassword  : repassword,
                    role        : role
                },
                beforeSend  : function()
                {
                    $("#error").fadeOut();
                    $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                },
                success     : function(response)
                {
                    if(response.ok == true)
                    {
                        $("#btn-submit").html('Signing Up');
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Account was successfully created!</div>');
                        window.location.replace("login.html");
                    }
                    else{
                        $("#error").fadeIn(1000, function(){
                            $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+ response.error +'</div>');
                            $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
                        });
                    }
                }
            });
            return false;
        }
    });
});