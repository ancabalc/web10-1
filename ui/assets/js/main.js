$(document).ready(init);

    function init(){
        getOffers();
    }
    function getOffers() {
         $.ajax ({
            url:'https://web10-1-ikilledkenny.c9users.io/api/offers?id=1',
            method: 'GET',
            success: function (result){
            },
            error: function (XHR, status, error) {
                alert ('Unable to get articles');
            },
            complete: function (XHR, status) {},
        });
    }