<div id="robo" class="grid_8 alpha">
    <div id="robo-video">
        <h1>Video</h1>
        <?= $video ?>
    </div>
    <?if(access('Robo control')):?>
    <div id="robo-controls">
        <ul>
            <li><a href="#" onclick="roboCommand('rotateLeft')">Rotate Left</a></li>
            <li><a href="#" onclick="roboCommand('left')">←</a></li>
            <li><a href="#" onclick="roboCommand('forward')">↑</a></li>
            <li><a href="#" onclick="roboCommand('bacward')">↓</a></li>
            <li><a href="#" onclick="roboCommand('right')">→</a></li>
            <li><a href="#" onclick="roboCommand('rotateRight')">Rotate Right</a></li>
            <li><a href="#" onclick="roboCommand('action1')">Action 1</a></li>
            <li><a href="#" onclick="roboCommand('action2')">Action 2</a></li>
            <li><a href="#" onclick="roboCommand('action3')">Action 3</a></li>
            <li><a href="#" onclick="roboCommand('goHome')">Go Home</a></li>
            <li><a href="#" onclick="roboCommand('goHomeAndDock')">Go Home and Dock</a></li>
        </ul>
    </div>
    <?endif;?>
</div>
<div class="grid_5 omega">
    <?=theme('rsidebar')?>
</div>