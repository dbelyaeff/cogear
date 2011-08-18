function roboCommand(command){
    $.get('/robo/command/'+command);
}

$(document).keypress(function(event){
    switch(event.keyCode){
        case 37:
            roboCommand('rotateLeft');
            break;
        case 38:
            roboCommand('forward');
            break;
        case 39:
            roboCommand('rotateRight');
            break;
        case 40:
            roboCommand('backward');
            break;
    }
})