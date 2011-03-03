<div class="menu" id="menu-<?=$menu->name?>">
    <ul>
<?php
foreach($menu as $element){
    echo '<li>'.$element.'</li>';
}
?>
    </ul>
</div>