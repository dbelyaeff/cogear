$(document).ready(function(){
        $('form div.errors.active').each(function(){
            var target = $(this).parent();
        $(this).slideDown("slow"); 
        $(this).prev().css('box-shadow','0px 0px 1px red').change(function(){
            $(this).next().slideUp("slow");
            $(this).css('box-shadow','');
        });
    });
});
