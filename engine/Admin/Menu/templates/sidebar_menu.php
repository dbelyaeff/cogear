<div id="admin-menu" class="sidebar_menu">
    <ul>
        <? $last_level = 1 ?>
        <? $root = substr($menu->getIterator()->key(),1)?>
        <?php foreach ($menu as $url => $element): ?>
            <? $uri = substr(parse_url($url,PHP_URL_PATH),1)?>
            <? $level = substr_count($uri, '/') ?>
                <? if($level > $last_level && $level > 1):?>
                    <ul>
                <? elseif($level < $last_level):?>
                    </ul>
                <? endif; ?>
            <li>
                <?
                 $class = '';
                 $element->active && $class='class="active"';
                ?>
                <a href="<?=$url?>"<?=$class?>><?=$element->value?></a>
                
            <? $last_level = $level ?>
        <?php endforeach; ?>
    </ul>
</div>