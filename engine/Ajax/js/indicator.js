(function($){
    $.fn.loading = function(options){
        settings = {
            'type': 'after'
        }
        $.extend(settings,options);
        if(this.next().attr('id') == 'ajax-indicator'){
            $('#ajax-indicator').hide().appendTo($('body'));
        }
        else {
            $(this).after($('#ajax-indicator').show());
        }
    }
    $(document).ready(function(){
        $('.ajaxed').click(function(){
            $(this).loading();
        })
    });
})(jQuery);