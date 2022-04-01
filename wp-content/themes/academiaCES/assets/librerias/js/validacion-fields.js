jQuery(function($) {

$(document).ready(function(){
    $('button#place_order').css('display','none');
    $('#message').keyup(function(){
        if($(this).val().length !=0)
          $('button#place_order').css('display','none');          
        else
            $('button#place_order').css('display','block');
    })
});

});