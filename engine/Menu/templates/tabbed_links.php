<div class="menu" id="menu-<?=$menu->name?>">
<?php
 $size = count($menu);
 $i = 0;
 foreach($menu as $element){
     if($element->isActive()){
         echo $element['value']['text'];
     }
     else {
         echo HTML::a($element['value']['link'],$element['value']['text']);
     }
     if(++$i < $size){
         echo ' | ';
     }
 }
?>
</div>