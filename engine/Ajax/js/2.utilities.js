$(document).ajaxStart(function(){
    $('body').css('cursor','progress');
});
$(document).ajaxStop(function(){
    $('body').css('cursor','auto');
});