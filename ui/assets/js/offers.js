$(document).ready(init);
function init () {
    $('.list-group').ready(function(){
        getOffers(1);
    });
   
}
function getOffers(applicationId) {
     $.ajax ({
        url:BASE_URL + `/api/offers?id=` + applicationId,
        method: 'GET',
        success: function (result){
            if (result.ok) {
                renderArticlesList(result.data);
            } else {
                console.log(result.error);
            }
                
        },
        error: function (XHR, status, error) {
            alert ('Unable to get offers');
        },
        complete: function (XHR, status) {},
    });
}
function renderArticlesList(offers) {
    var html = '<ul class="list-unstyled">';
    $.each(offers, function(index, offer){
        html += `
        <div class="list-group">
          <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">`+ "Name:" +offer.name +", " + "Job: " + offer.job +`</h4>
            <p class="list-group-item-text">`+ offer.description + `</p>
          </a>
        </div>
    `;
    });
    html += '</ul>';
    
    $('.offers-list').html(html);
}