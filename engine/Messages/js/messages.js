(function($){
    window.Messenger = {
        tpl: '<div class="msg"><a href="#" class="msg-close">x</a></span><div class="msg-title"></div><div class="msg-body"></div></div>',
        container: null,
        stack: [],
        init_flag: false,
        render_flag: false,
        init: function(force){
            if(!force && this.inite_flag) return;
            $('#msgs-holder').remove();
            this.unbind();
            $this = this;
            this.container = $('<div id="msgs-holder"/>');
            $container = this.container;
            $container.hide();
            this.stack = [];
            this.init_flag = true;
        },
        add: function(b,t,c){
            var msg = $(this.tpl);
            t && msg.find('.msg-title').text(t);
            msg.addClass(c || 'info');
            msg.find('.msg-body').html(b);
            $this = this;
            var id = this.stack.length + 1;
            msg.attr('id','msg-' + id);
            this.append(msg);
            return 'msg-'+id;
        },
        show: function(b,t,c){
            if(this.render_flag){
                this.init();
            }
            var id = this.add(b,t,c);
            this.render();  
            return id;
        },
        append: function(msg){
            this.stack.push(msg);
        },
        bind: function(){
            $(document.body).bind({
                'keyup.msg-holder' : function(e){
                    switch(e.keyCode){
                        case 27:
                            $this.removeAll();
                            break;
                        case 32:
                        case 13:
                            $this.remove();
                    }
                },
                'click.msg-holder': function(e){
                    var width = $container.width();
                    var height = $container.height();
                    var top = $container.offset().top;
                    var left = $container.offset().left
                    if(e.pageX < left || e.pageX > left+width || e.pageY < top || e.pageY > top+height){
                        $this.remove();
                    }
                }
            });
        },
        unbind: function(){
            $(document.body).unbind('keyup.msg-holder');
            $(document.body).unbind('click.msg-holder');
        },
        render: function(){
            $container = this.container;
            $.each(this.stack,function(index){
                this.show();
                this.prependTo($container);
            });
            $('body').prepend(this.container);
            if(this.stack.length > 0){
                this.repos();
                this.bind();
                $container.show();  
            } 
            this.render_flag = true;
        },
        repos: function(){
            this.container.css({    
                width: 450,
                height: 200,
                margin: '-100px 0 0 -225px',
                position: 'absolute',
                left: '50%',
                top: '50%'
            });
        },
        remove: function(id){
            $('#msgs-holder > .msg:visible').first().fadeOut();
            this.clear();
        },
        removeAll: function(){
            $.each(this.stack,function(){
                this.fadeOut();
            });
            this.clear();
        },
        clear: function(){
            if(!$('#msgs-holder > .msg:visible').length){
                this.init();
            }
        }
    }
    window.Messenger.init();
    $.fn.message = function(){
        $.each(this,function(){
            $(this).hide();
            window.Messenger.append($(this));
        });
    }
    $(document).ready(function(){
        $('a.msg-close').live('click',function(){
            $(this).parent().fadeOut();
        });    
    })
    $.fn.confirm = function(question){
        $target = this;
        var id = message(question + "<p align='center' class='buttons'><input type='submit' value='Yes' class='yes'><input type='submit' value='No' class='no'></p>");
        $('#'+id).find('.yes').click(function(){
            $($target).attr('rel','yes');
            $('#'+id).fadeOut();
            $($target).click();
            if($($target).attr('href')){
                window.location = $($target).attr('href');
            }
        });    
        $('#'+id).find('.no').click(function(){
            $('#'+id).fadeOut();
        });  
    }
})(jQuery)

function message(b,t,c){
    return window.Messenger.show(b,t,c);
}

function dialog_confirm(text){

    
}