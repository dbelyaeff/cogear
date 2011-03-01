(function($){
    $.fn.formAction = function(action){
        if(!action) action = 'replace';
        var $this = this;
        this.attr('href',location);
        this.click(function(){
            form = $this.parent().parents('form');
            form_id = form.attr('id');
            name = $this.attr('rel');
            $.getJSON(location.href,
            {
                form:   form_id,
                element:   name,
                action: action
            },
            function(data){
                switch(data.action){
                    case 'replace':
                        $('#'+form_id+'-'+name+'-element').html(data.code);
                        break;
                }
            })
            return false;
        });
    }
    $(document).ready(function(){
        $('a.form-action').formAction('replace');
    })
})(jQuery)

