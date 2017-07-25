var BASE_URL = '/api/';
    
var endpoints = {
    login:    BASE_URL + 'accounts/login',
}
    
var make_call = function(params, callback) {
    $.ajax({
        url: params.url,
        method: params.method,
        data: params.data,
        success: function (result) {
            if (result.ok === false) {
              return callback(result.error, null);
            }
            
            return callback(null,result.data);
        },
        error: function (XHR, status, error) {
            callback(error, null);
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
    if (data === undefined) {
        return;
    } else {
        loginCall(data, function(err, result){
            if (err) {
                return displayMessage(err.text + '[' + err.error + ']');
            } 
            else {
                return displayMessage('Login successful.');
                //window.location.assign("https://web10-1-andreamarginean.c9users.io/index.html");
            }
        })
    }
}

function loginCall(data, callback) {
    var params = {
        url: endpoints.login,
        method: 'POST',
        data: data
    }
   make_call(params, function(error, result) {
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
    var email = getEmail();
    var pass = getPass();
    if ((email==='') || (pass=='')) {
        displayMessage('Please fill out both email and password fields.');
        return;
    } else {
        var data = {
            email: email,
            password: pass
        }
        return data;
    }
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