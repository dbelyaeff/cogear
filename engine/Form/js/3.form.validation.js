(function($){
    $(document).ready(function(){
        $('form.ajaxed').each(function(){
            $(this).ajaxForm({
                dataType: 'json',
                success: function(data){
                }
            })
        });
    });
})(jQuery)