(function($){
    $(document).ready(function(){
      $('table.list .check-all input[type=checkbox]').click(function(){
          $(this).parent().parent().parent().parent().find('input[type=checkbox]').attr('checked',$(this).attr('checked'));
      }); 
    });
})(jQuery);