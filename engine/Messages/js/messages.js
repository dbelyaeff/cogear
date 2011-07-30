(function($){
    window.msg = {
        tpl: '<div class="msg"><a href="#" class="msg-close">x</a></span><div class="msg-title"></div><div class="msg-body"></div></div>',
        container: null,
        stack: [],
        init: function(){
            this.clear();
            $this = this;
            $(window).bind('keyup.msg-holder',function(e){
                switch(e.keyCode){
                    case 32:
                    case 27:
                    case 13:
                        $this.remove();
                }   
            })
        },
        show: function(b,t,c){
            var msg = $(this.tpl);
            t && msg.find('.msg-title').text(t);
            c && msg.addClass(c);
            msg.find('.msg-body').html(b);
            $this = this;
            var id = this.stack.length + 1;
            msg.attr('id','msg-' + id);
            this.append(msg);
        },
        append: function(msg){
            this.stack.push(msg);
        },
        render: function(){
            $container = this.container;
            $.each(this.stack,function(index){
                this.prependTo($container);
            });
            $('body').prepend(this.container);
            $container.show();
        },
        remove: function(id){
            $('#msgs-holder > .msg:visible').first().fadeOut();
            if($('#msgs-holder > .msg:visible') == null){
                this.clear();
            }
        },
        removeAll: function(){
            $.each(this.stack,function(){
                this.fadeOut();
            });
            this.clear();
        },
        clear: function(){
            this.container = $('<div id="msgs-holder"/>');
            this.container.hide();
        }
    }
    $.fn.msg = function(){
        window.msg.append($(this));
    }
    function msg(b,t,c){
        window.msg.show(b,t,c);
    }
    window.msg.init();
    
    $(document).ready(function(){
        $('a.msg-close').click(function(){
            $(this).parent().fadeOut();
        });
    })
})(jQuery)
