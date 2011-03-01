$(function(){
    $(document).ready(function(){
      $(window).hashchange(function(){
        if(location.hash.charAt(1) == '/' || location.hash.charAt(1) == '?'){
            url = location.hash.substr(1);
            $.getJSON(url,function(data){
                switch(data.action){
                    case 'replace':
                        $('#'+data.id+'-element').replaceWith(data.code);
                        break;
                }
                location.hash = '';
            })
            return FALSE;
        }
      });
    })
});
