$(document).ready(function(){
        $('form div.errors.active').each(function(){
        $(this).css({
            position: 'absolute',
            top: $(this).prev().position().top,
            left: $(this).prev().position().left + $(this).prev().width() + 10
        }).fadeIn("slow"); 
        $(this).prev().change(function(){
            $(this).next().fadeOut("slow");
        })
    });
});
