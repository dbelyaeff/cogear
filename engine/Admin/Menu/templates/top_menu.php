<ul class="top_menu">
    <? foreach($menu as $uri=>$element): 
        $element->class OR $element->class = '';
        if($element->active){
            $element->class .= ' active';
        }
        ?>
        <li <? if($element->class){?>class="<?=trim($element->class)?>"<?}?>><a href="<?=$uri?>"><?=$element->value?><? if($element->count){?> (<?=$element->count?>)<?}?></a></li>
    <? endforeach; ?>
</ul>
