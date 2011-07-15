(function($){
    modal = {
        windows: [],
        container: $('<div id="modal_windows"></div>'),
        repos: function(){
            $this = this.container;
            $this.css({
                'position': 'absolute',
//                'top': '0',
//                'right': '0',
//                'margin-top': 5 + 'px',
//                'margin-right': 5 + 'px',
                'top': '50%',
                'left': '50%',
                'margin-top': -$this.height()/2 + 'px',
                'margin-left': -$this.width()/2 + 'px',
            });
        },
        render: function(selector){
            $this = this.container;
            $this.appendTo($('body'));
            $this.hide();
            master = this;
            $(selector).each(function(){
                master.push($(this));
            });
            this.repos();
            $this.fadeIn();
            // Close modal window if either Enter, Esc or Spacebar are pressed
            $(window).bind('keyup.modal',function(e){
                switch(e.keyCode){
                    // Spacebar
                    case 32:
                    // Esc
                    case 27:
                    // Enter
                    case 13:
                        modal.out();
                        break;
                }
            });
            $(window).bind('click.modal',function(e){
                var x = {
                    from: $this.offset().left,
                    to: $this.offset().left + $this.width()
                } 
                var y = {
                    from: $this.offset().top,
                    to: $this.offset().top + $this.height()
                };
                if( (e.clientX < x.from || e.clientX > x.to) | (e.clientY < y.from || e.clientY > y.to)){
                    modal.out();
                }
            });
        },
        push: function(window){
            window.detach();
            var current = window;
            var cross = $('<div class="close">X</div>');
            window.prepend(cross);
            cross.click(function(){
                modal.out();
            });
            window.show();
            window.appendTo($this);
        },
        out: function(){
            var windows = this.container.find('.modal:visible');
            console.log(windows);
            if(windows.length > 1){
                windows.first().slideUp();
                this.repos();
            }
            else if(windows.length > 0){
                windows.first().fadeOut();
                this.repos();
            }
            else {
                $(window).unbind('.modal');
                this.container.hide();
            }
        }
    }
})(jQuery);

$(document).ready(function(){
    modal.render('.message');
})
