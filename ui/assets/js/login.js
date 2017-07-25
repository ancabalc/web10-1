var BASE_URL = 'https://web10-1-andreamarginean.c9users.io/api/';
    
var endpoints = {
    login:    BASE_URL + 'accounts/login',
}
    
var make_call = function(params, callback) {
    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        success: function (result) {
            if (!result.ok) {
              return callback(result.error, null);
            }
            
            return callback(null,result.data);
        },
        error: function (XHR, status, error) {
            callback(error);
        },
        complete: function (XHR, status) {
           
        },
    }) 
}

$(document).ready(init);

function init() {
    $('#login_btn').click(loginUser);
}

function loginUser() {
    var data = createLoginData();
    console.log('Before loginCall');
    loginCall(data, function(err, result){
    console.log('After loginCall')
        //Din controller returneaza boolean ok = true sau false
        // return "ok"-> bool, "error"-> string, "data"->response
        if (err) {
            return displayMessage(err.text + '[' + err.error + ']');
        } else if (data.ok=false) {
            return displayMessage('Incorrect user or password');
        } else {
            return displayMessage('Login successful.');
            //window.location.assign("https://web10-1-andreamarginean.c9users.io/index.html");
        }
    })
}

function loginCall(data, callback) {
    console.log('In loginCall')
    var params = {
        url: endpoints.login,
        method: 'POST',
        data: data
    }
   make_call(params, function(error, result) {
       console.log('In make_call');
       if (error) {
            return callback({
                error: error,
                text: 'Could not verify credentials.'
            })
       }

       callback(null, result);
   }); 
}

function createLoginData() {
    var data = {
        email: getEmail(),
        password: getPass()
    }
    return data;
}

function getEmail() {
    return $('#login_email').val();
    
}

function getPass() {
    return $('#login_pass').val();
}

function displayMessage(txt) {
     $('#message').text(txt);
}