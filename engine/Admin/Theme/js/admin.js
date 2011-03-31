$(document).ready(function(){

	/* mark sidebar menu items that have submenu*/
	$('.sidebar_menu ul li ul').parent('li').children('a').addClass('submenu');

	/* remove .active class from the active menu item  on any menu item hover. just looks better */
	var active_side_menu_item = $('.sidebar_menu .active');
	$('.sidebar_menu ul').hover(
	  function () {
		$('.sidebar_menu ul li a').removeClass('active');
	  },
	  function () {
		$(active_side_menu_item).addClass('active');
	  }
	);
        $('.sidebar_menu ul li a').hover(function(){
            $(this).parent('li').children('ul').show();
            var active = $(this);
            $('.sidebar_menu ul li ul').filter(function(){
                return !$(this).find(active);
            }).hide();
        },function(event){
            if(event.pageY > $(this).offset().top + $(this).height() || event.pageY < $(this).offset().top){
                $('.sidebar_menu ul li ul').hide();
            }
        });
         $('.sidebar_menu ul li ul').hover(function(){},function(){
             $(this).hide();
         });
        
//	$('.sidebar_menu ul ul').unbind();


	/* show arrow for sidebar submenu */
	$('.sidebar_menu ul li ul').hover(
	  function () {
		$(this).parent('li').children('a').addClass('hover');
	  },
	  function () {
		$(this).parent('li').children('a').removeClass('hover');
	  }
	);

	/* sidebar hider */
	$(".sidebar_hider").toggle(
	  function () {
		$('.sidebar_menu').addClass('sidebar_menu_hidden');
		$(".sidebar_hider").addClass('hidden');
		$(".content_column").addClass('wide');
	  },
	  function () {
		$('.sidebar_menu').removeClass('sidebar_menu_hidden');
		$(".sidebar_hider").removeClass('hidden');
		$(".content_column").removeClass('wide');
	  }
	);


	/* .data_gird table zebra */
	$(".data_gird tr:nth-child(even)").addClass("even");

	$('input[type=radio], input[type=checkbox]').next('label').css('font-weight','normal').css('cursor','pointer');

	/* :focus solution for older browsers that does not support it */
	focusfix('input[type=text], input[type=password], input.text, input.title, textarea, select', 'focus');

	/* checkbox in the table header rules all the checkboxes in a column */
	$(".data_gird thead tr th:first input:checkbox, .data_gird tfoot tr th:first input:checkbox").click(function() {
		var checkedStatus = this.checked;
		$(".data_gird td:first-child input:checkbox, .data_gird th:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
		});
	});
	$(".data_gird input:checkbox").click(function() {
		$(this).parent().parent().toggleClass("active")
	})


});


// Adds a class focus to input text when focused
function focusfix(selector, className) {
	$(selector).focus(function() {
	$(this).addClass(className);
	});
	// Removes class when focus is lost
	$(selector).blur(function() {
	$(this).removeClass(className);
	});
}

(function($){
    $(document).ready(function(){
      $('table.list .check-all input[type=checkbox]').click(function(){
          $(this).parent().parent().parent().parent().find('input[type=checkbox]').attr('checked',$(this).attr('checked'));
      }); 
    });
})(jQuery);
