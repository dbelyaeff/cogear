$(document).ready(function(){
    $('#user_cp #developer').mouseover(function(){
        $('#debug').slideDown('slow').mouseleave(function(){
            $(this).slideUp('slow');
        });
    })
})