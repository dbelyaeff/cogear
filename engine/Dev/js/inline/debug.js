$(document).ready(function(){
    $('#user_cp #dev').mouseover(function(){
        $('#debug').slideDown('slow').mouseleave(function(){
            $(this).slideUp('slow');
        });
    })
})