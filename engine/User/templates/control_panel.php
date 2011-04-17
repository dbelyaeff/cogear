<div id="user_cp">
    <ul>
    <? foreach($menu as $key=>$item): ?>
        <li id="<?=str_replace('/','-',trim($key,'/'))?>"><a <?if($item->active):?> class="active"<?endif?> href="<?=$key?>"><?=$item->value?></a></li>
    <? endforeach; ?>
    </ul>
</div>