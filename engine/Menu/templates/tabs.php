<div class="menu tabs" id="<?= $menu->getName() ?>">
    <ul>
        <? foreach ($menu as $url=>$item): ?>
           
            <li<?php if($item->active):?> class="active"<?endif?>>
                <a href="<?= $url ?>"><?= $item->value ?></a>
            </li>
        <? endforeach ?>
    </ul>
</div>