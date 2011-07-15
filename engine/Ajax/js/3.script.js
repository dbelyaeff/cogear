$(document).ready(function(){
    $(window).hashchange(function(){
        if(location.hash.charAt(1) == '/' || location.hash.charAt(1) == '?'){
            url = location.hash.substr(1);
            $.getJSON(url,function(data){
                $.each(data,function(key,item){
                    switch(item.action){
                        case 'replace':
                            $('#'+item.id).replaceWith(item.code);
                            break;
                    }
                });
            })
            location.hash = '';
            return false;
        }
    });
})
